<!DOCTYPE html>
<html lang="en">

<?php 
    require_once 'db.php';

    session_start();

    if(!isset($_SESSION['user'])){
        header('Location: index');
        die();
    }
    if($_SESSION['user']['id'] != $_GET['id']){
        if($_SESSION['user']['role'] != "admin"){
            header('Location: index');
            die();
        } else {
      
        }
    }


    if(isset($_GET['id'])){
        $sql = 'SELECT * from authors where id = :id';
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':id' => $_GET['id'],
        ]);
        $author = $stmt->fetchAll();
    }

    if(isset($_POST['name'],$_POST['surname'],$_POST['id'])){
        $sql = 'UPDATE authors SET name = :name, surname = :surname, email = :email where id = :id';
        $stmt = $conn ->prepare($sql);
        $stmt -> execute([
            ':name' => $_POST['name'],
            ':surname' => $_POST['surname'],
            ':email' => $_POST['email'],
            ':id' => $_POST['id'],
        ]);
        header("Location: authors");
        die();
    }

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <title>PHP News</title>
</head>

<body class="bg_platinum">
    <a href="#main" class="jump">skip</a>
    <div id="home"></div>
    <div id="header" class="bg_oxford_blue">
        <div class="container">
            <nav class="navbar">
                <a href="index" class="navbar-brand">PHP News</a>
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a href="index" class="nav-link">Zprávy</a>
                    </li>
                    <li class="nav-item">
                        <a href="category" class="nav-link">Kategorie</a>
                    </li>
                    <li class="nav-item">
                        <a href="authors" class="nav-link active">Autoři</a>
                    </li>
                    <?php if(isset($_SESSION['user'])): ?>
                    <li class="nav-item">
                        <a href="admin_post" class="nav-link">Administrace článků</a>
                    </li>
                    <li class="nav-item">
                        <a href="add_post" class="nav-link">Přidat článek</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout" class="nav-link">Odhlásit se</a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a href="login" class="nav-link">Přihlásit se</a>
                    </li>
                    <li class="nav-item">
                        <a href="register" class="nav-link">Vytvořit účet</a>
                    </li>
                    <?php endif; ?>
                </ul>
                <a class="nav-link" href="#home"><i class="bi bi-arrow-up-circle-fill"></i></a>
            </nav>
        </div>
    </div>
    <div class="container bg_white my-3">
        <h1 class="py-2 brand"><span>PHP</span> News</h1>
        <header class="bg_space_cadet rounded-2">
            <nav class="menu p-2">
                <a href="index" class="nav-item">Zprávy</a>
                <a href="category" class="nav-item">Kategorie</a>
                <a href="authors" class="nav-item active">Autoři</a>
                <?php if(isset($_SESSION['user'])): ?>
                <a href="admin_post" class="nav-item">Administrace článků</a>
                <a href="add_post" class="nav-item">Přidat článek</a>
                <a href="logout" class="nav-item">Odhlásit se</a>
                <?php else: ?>
                <a href="login" class="nav-item">Přihlásit se</a>
                <a href="register" class="nav-item">Vytvořit účet</a>
                <?php endif; ?>
            </nav>
        </header>
        <main class="py-3" id="main">
            <section class="row flex-row-reverse justify-content-center">
                <form action="" method="post">
                    <label for="name" class="form-label">Jméno</label>
                    <input class="form-control" id="name" type="text" name="name" value="<?= $author[0]['name'] ?>">
                    <label for="surname" class="form-label">Příjmění</label>
                    <input class="form-control" id="surname" type="text" name="surname"
                        value="<?= $author[0]['surname'] ?>">
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control" id="email" type="text" name="email" value="<?= $author[0]['email'] ?>">
                    <input class="disable" type="text" name="id" value="<?= $author[0]['id'] ?>">
                    <button class="btn btn-success">Edit</button>
                </form>
                <a type="button" class="btn btn-secondary w150" href="authors">Back</a>
            </section>
        </main>
    </div>


    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    window.onscroll = function() {
        scroll();
    }

    function scroll() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("header").style.top = "0";
        } else {
            document.getElementById("header").style.top = "-180px";
        }
    }
    </script>
</body>

</html>