<?php
$conn = new PDO('mysql:host=127.0.0.1;dbname=php_news', 'root','1023450', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$conn->query('SET NAMES utf8');
?>