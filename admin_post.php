<!DOCTYPE html>
<html lang="en">

<?php 
    session_start();

    if(!isset($_SESSION['user'])){
        header('Location: index');
        die();
    }

    require_once 'db.php';

    if($_SESSION['user']['role'] === "editor"){
        $sql = 'SELECT ar.*, a.name AS a_name, a.surname AS a_surname, a.id as id_author, c.name as c_name FROM articles ar INNER JOIN authors a ON ar.author_id = a.id INNER JOIN category c on ar.category_id = c.id where a.id = :id order by ar.title ASC';
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':id' => $_SESSION['user']['id'],
        ]);
        $articles = $stmt->fetchAll();
    } elseif($_SESSION['user']['role'] === "admin") {
        $sql = 'SELECT ar.*, a.name AS a_name, a.surname AS a_surname, a.id as id_author, c.name as c_name FROM articles ar INNER JOIN authors a ON ar.author_id = a.id INNER JOIN category c on ar.category_id = c.id order by ar.title ASC';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $articles = $stmt->fetchAll();
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
                <a href="admin_post" class="nav-item active">Administrace článků</a>
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
                <a type="button" href="add_post" class="btn btn-success w150">Add
                    Post</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Category</th>
                            <th scope="col">Active</th>
                            <th scopr="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($articles as $item): ?>
                        <tr>
                            <td><?= $item['id'] ?></td>
                            <td><a href="article?id=<?= $item['id'] ?>"><?= $item['title'] ?></a></td>
                            <td><a href="index?author=<?= $item['id_author'] ?>"><?= $item['a_name'] . ' ' . $item['a_surname'] ?></a></td>
                            <td><a href="index?category=<?= $item['category_id']?>"><?= $item['c_name'] ?></a></td>
                            <td><p><?= $item['active'] ?></p></td>
                            <td>
                            <a href="edit_post?id=<?= $item['id'] ?>" class="btn btn-warning">Edit</a>
                            <?php if($item['active']): ?>
                                <a href="unpublish?id=<?= $item['id'] ?>" class="btn btn-info">UnPublish</a>
                            <?php else: ?>
                                <a href="publish?id=<?= $item['id'] ?>" class="btn btn-success">Publish</a>
                            <?php endif?>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modal<?= $item['id'] ?>">Delete</button>
                            </td>
                        </tr>


                        <!-- Modal -->
                        <div class="modal fade" id="modal<?= $item['id'] ?>" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Odstraněné článku</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php 
                                        echo 'Opravdu chcete smazat článke <b> ' . $item['title'] . '</b>';
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <a href="delete_post?id=<?= $item['id'] ?>" type="button"
                                            class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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