<?php

session_start();

if(isset($_SESSION['user'])){
    header('Location: index');
    die();
}

    require_once('db.php');

    if(isset($_POST["email"], $_POST["password"])){
        $sql = 'INSERT INTO authors VALUES(default,:name, :surname, :password, :email, default)';
        $passwd = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $stmt = $conn->prepare($sql);

        $stmt-> execute([
            ':name' => $_POST['name'],
            ':surname' => $_POST['surname'],
            ':password' => $passwd,
            ':email' => $_POST['email'],
        ]);
        header("Location: login");
        die();
    }

?>

<!DOCTYPE html>
<html lang="en">

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
                        <a href="authors" class="nav-link">Autoři</a>
                    </li>
                    <?php if(isset($_SESSION['user'])): ?>
                    <li class="nav-item">
                        <a href="admin_post" class="nav-link">Administrace článků</a>
                    </li>
                    <li class="nav-item">
                        <a href="add_post" class="nav-link">Přidat článek</a>
                    </li>
                    <li class="nav-item">
                        <a href="edit_author?id=<?= $_SESSION['user']['id'] ?>" class="nav-link">Profil</a>
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
                <a href="authors" class="nav-item">Autoři</a>
                <?php if(isset($_SESSION['user'])): ?>
                <a href="admin_post" class="nav-item">Administrace článků</a>
                <a href="add_post" class="nav-item">Přidat článek</a>
                <a href="edit_author?id=<?= $_SESSION['user']['id'] ?>" class="nav-item">Profil</a>
                <a href="logout" class="nav-item">Odhlásit se</a>
                <?php else: ?>
                <a href="login" class="nav-item">Přihlásit se</a>
                <a href="register" class="nav-item active">Vytvořit účet</a>
                <?php endif; ?>
            </nav>
        </header>
        <main class="py-3" id="main">
            <section class="row flex-row-reverse justify-content-center">
                <div class="col-4">
                    <form action="" method="post" class="row g-3">
                        <label for="title_input" class="form-label">Name</label>
                        <input type="text" id="title_input" name="name" class="form-control">
                        <label for="title_input" class="form-label">Surname</label>
                        <input type="text" id="title_input" name="surname" class="form-control">
                        <label for="title_input" class="form-label">Email</label>
                        <input type="text" id="title_input" name="email" class="form-control">
                        <label for="text_input" class="form-label">Password</label>
                        <input type="password" id="text_input" name="password" class="form-control">
                        <button class="btn btn-oxford w150">Register</button>
                    </form>
                </div>
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