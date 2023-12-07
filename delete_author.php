<?php 
include_once 'db.php';

session_start();

if(!isset($_SESSION['user'])){
    header('Location: index');
    die();
}

if(!isset($_GET['id']))
{header('Location: authors');
die();}

$sql = 'DELETE FROM authors WHERE id = :id';

$stmt = $conn->prepare($sql);
$stmt->execute([
    ':id' => $_GET['id'],
]);


header('Location: authors');
die();
?>