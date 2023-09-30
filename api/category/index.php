<?php
// headers
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

// initializing our api
include_once('../../core/initialized.php');

// instantiate category 
$category = new Category($pdo);

//  category query 
$result = $category->index();
// get the row count
$num = $result->rowCount();

if ($num > 0) {
    $category_arr = array();
    $category_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $category_item = array(
            'id' => $id,
            'name' => $name,
        );
        array_push($category_arr['data'], $category_item);
    }
    // convert to JSON and output
    echo json_encode($category_arr);
} else {
    echo json_encode(["message" => "No Category Found"]);
}
