<?php
// headers
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// initializing our api
include_once('../../core/initialized.php');

// instantiate category 
$category = new Category($pdo);

// get raw category data 
$data = json_decode(file_get_contents("php://input"));
$category->name = $data->name;
// create the category
if ($category->create()) {
    echo json_encode(['message' => 'Category Created']);
} else {
    echo json_encode(['message' => 'Category not Created']);
}
