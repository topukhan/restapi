<?php
$db_user = 'root';
$db_password = '';
$db_name = 'restapi';

$pdo = new PDO('mysql:host=127.0.0.1;dbname=' . $db_name, $db_user, $db_password);

$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

define('APP_NAME', 'PHP REST API');