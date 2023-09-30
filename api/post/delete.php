<?php
// headers
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// initializing our api
include_once('../../core/initialized.php');

// instantiate post 
$post = new Post($pdo);

$data = json_decode(file_get_contents("php://input"));
$post->id = $data->id;


// update the post
if ($post->delete()) {
    echo json_encode(['message' => 'Post Deleted']);
} else {
    echo json_encode(['message' => 'Post not deleted']);
}
