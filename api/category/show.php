<?php
// headers
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

// initializing our api
include_once('../../core/initialized.php');

// instantiate category 
$category = new Category($pdo);

$category->id = isset($_GET['id']) ? $_GET['id'] : die();
$category->show();

$category_arr = [
    'id' => $category->id,
    'name' => $category->name,
];
print_r(json_encode($category_arr));
