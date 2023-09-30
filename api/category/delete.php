<?php
// headers
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// initializing our api
include_once('../../core/initialized.php');

// instantiate category 
$category = new Category($pdo);

$data = json_decode(file_get_contents("php://input"));
$category->id = $data->id;


// update the Category
if ($category->delete()) {
    echo json_encode(['message' => 'Category Deleted']);
} else {
    echo json_encode(['message' => 'Category not deleted']);
}
