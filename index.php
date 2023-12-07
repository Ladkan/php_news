<!DOCTYPE html>
<html lang="en">

<?php 
    //session_start();

    require_once 'db.php';

    $sql = 'SELECT ar.*, a.name AS name, a.surname AS surname, a.id as id_author, c.name as cat_name FROM articles ar INNER JOIN authors a ON ar.author_id = a.id inner join category as c on ar.category_id = c.id  where ar.active = 1 order by id desc limit 5';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $articles = $stmt->fetchAll();

    $sql2 = 'SELECT ar.*, a.name AS name, a.surname AS surname, a.id as id_author, c.id as id_category, c.name as cat_name FROM articles ar INNER JOIN authors a ON ar.author_id = a.id INNER JOIN category c ON ar.category_id = c.id where ar.active = 1 order by id desc';
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();
    $Allarticles = $stmt2->fetchAll();

    $filter = array();

    if(isset($_GET['author'])){
        foreach($Allarticles as $item){
            if($item['id_author'] == $_GET['author']){
                array_push($filter,$item);
            }
        }
    } else if(isset($_GET['category'])){
        foreach($Allarticles as $item){
            if($item['id_category'] == $_GET['category']){
                array_push($filter,$item);
            }
        }
    } else {
        $filter = $articles;
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
                        <a href="index" class="nav-link active">Zprávy</a>
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
                <a href="index" class="nav-item active">Zprávy</a>
                <a href="category" class="nav-item">Kategorie</a>
                <a href="authors" class="nav-item">Autoři</a>
                <?php if(isset($_SESSION['user'])): ?>
                <a href="admin_post" class="nav-item">Administrace článků</a>
                <a href="add_post" class="nav-item">Přidat článek</a>
                <a href="edit_author?id=<?= $_SESSION['user']['id'] ?>" class="nav-item">Profil</a>
                <a href="logout" class="nav-item">Odhlásit se</a>
                <?php else: ?>
                <a href="login" class="nav-item">Přihlásit se</a>
                <a href="register" class="nav-item">Vytvořit účet</a>
                <?php endif; ?>
            </nav>
        </header>
        <main class="py-3" id="main">
            <section class="hero">
                <?php if(isset($_GET['author'])): ?>
                <?php if(!$filter): ?>
                <p>Autor nemá žádný obsah</p>
                <?php else: ?>
                <h1>Autor:</h1>
                <p><?= $filter[0]['name'] . ' ' . $filter[0]['surname'] ?></p>
                <?php endif ?>
                <?php elseif(isset($_GET['category'])): ?>
                <?php if(!$filter): ?>
                <p>Kategorie nemá žádný obsah</p>
                <?php else: ?>
                <h1>Kategorie:</h1>
                <p><?= $filter[0]['cat_name'] ?></p>
                <?php endif ?>
                <?php else: ?>
                <h1>Články</h1>
                <p>Nejnovější zprávy</p>
                <?php endif ?>
            </section>
            <section class="row flex-row-reverse justify-content-center">
                <div class="col-lg-6 order-1 order-lg-2">
                    <?php foreach($filter as $a): ?>
                    <div class="col-md-12 py-2">
                        <div class="mb-40">
                            <div class="col-md-12">
                                <div class="post">
                                    <a href="article?id=<?= $a['id'] ?>" class="title"><?= $a['title'] ?></a>
                                    <div class="info d-flex">
                                        <p class="date space_cadet">
                                            <?= date("d.m.Y H:i", strtotime($a['created_at'])) ?></p>
                                        <a href="index?author=<?= $a['id_author'] ?>"
                                            class="author px-2"><?= $a['name'] . ' ' . $a['surname'] ?></a>
                                        <a href="index?category=<?= $a['category_id'] ?>" class="px-2 author">
                                            <?= $a['cat_name'] ?> </a>
                                    </div>
                                    <p><?= $a['pretext'] ?></p>
                                    <div class="float-right">
                                        <a class="orange_web" href="article?id=<?= $a['id'] ?>">Číst dál <i
                                                class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
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