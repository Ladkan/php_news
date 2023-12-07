<?php 
    require_once 'db.php';

    session_start();

    if(!isset($_SESSION['user'])){
        header('Location: index');
        die();
    }

    if(isset($_GET['id'])){
        $sql = 'UPDATE articles SET active = 1 where id = :id';
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':id' => $_GET['id'],
        ]);
        header("Location: admin_post");
        die();
    }

?>