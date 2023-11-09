<?php
class Category
{
    // db connect 
    private $conn;
    private $table = 'categories';

    // category properties
    public $id;
    public $name;
    public $created_at;

    // constructor with bd connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // getting categories from db
    public function index()
    {
        $query = 'SELECT * FROM ' . $this->table . '  ORDER BY id DESC';
        // prepare statement
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }


    public function show()
    {
        $query = 'SELECT * FROM ' . $this->table . '  WHERE id = :id LIMIT 1';
        // prepare statement
        $stmt = $this->conn->prepare($query);
        //bind param
        $stmt->bindParam(':id', $this->id);
        // execute the query 
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $this->name = $row['name'];
            $this->created_at = $row['created_at'];
            return $stmt;
        }
        else{
            echo "Category not found for id ". $this->id. "\n\n";
        }
    }

    public function create()
    {
        $query = 'INSERT INTO ' . $this->table . ' SET name = :name, created_at = NOW()';
        // prepare statement
        $stmt = $this->conn->prepare($query);
        // data filter  
        $this->name = htmlspecialchars(strip_tags($this->name));
        // binding of params
        $stmt->bindParam(':name', $this->name);

        //execute the query
        if ($stmt->execute()) {
            return true;
        } else {
            $errorInfo = $stmt->errorInfo();
            printf("Error %s. \n", $errorInfo[2]);
            return false;
        }
    }
    // update category
    public function update()
    {
        $query = 'UPDATE ' . $this->table . ' SET name = :name, created_at = NOW() WHERE id = :id';
        // prepare statement
        $stmt = $this->conn->prepare($query);
        // data filter  
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // binding of params
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':id', $this->id);

        //execute the query
        if ($stmt->execute()) {
            return true;
        } else {
            printf("Error %s. \n", $stmt->error);
            return false;
        }
    }

    // Delete a category 
    public function delete()
    {
        // query to delete 
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        // prepare the query
        $stmt = $this->conn->prepare($query);
        // clean the data 
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(':id', $this->id);
        //execute the query
        if ($stmt->execute()) {
            return true;
        } else {
            printf("Error %s. \n", $stmt->error);
            return false;
        }
    }
}
