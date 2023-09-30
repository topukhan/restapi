<?php
// headers
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// initializing our api
include_once('../../core/initialized.php');

// instantiate category 
$category = new Category($pdo);

// get raw category data 
$data = json_decode(file_get_contents("php://input"));
$category->id = $data->id;
$category->name = $data->name;

// update the category
if ($category->update()) {
    echo json_encode(['message' => 'Category Updated']);
} else {
    echo json_encode(['message' => 'Category not updated']);
}
