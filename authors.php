<!DOCTYPE html>
<html lang="en">

<?php 
    require_once 'db.php';

    session_start();    

    $sql = 'SELECT * from authors';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $author = $stmt->fetchAll();
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
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] === "admin"): ?>
                            <th scope="col">Action</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($author as $item): ?>
                        <tr>
                            <td><?= $item['id'] ?></td>
                            <td><a
                                    href="index?author=<?= $item['id'] ?>"><?= $item['name'] . ' ' . $item['surname']?></a>
                            </td>
                            <?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] === "admin"): ?>
                            <td>
                                <a href="edit_author?id=<?= $item['id'] ?>" class="btn btn-warning">Edit</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modal<?= $item['id'] ?>">Delete</button>
                            </td>
                            <?php endif; ?>
                        </tr>


                        <!-- Modal -->
                        <div class="modal fade" id="modal<?= $item['id'] ?>" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Odstraněné autora</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php 
                                        $sql = 'SELECT * FROM articles where author_id = :id';
                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute([
                                            ':id' => $item['id'],
                                        ]);

                                $result = $stmt->fetchAll();

                                if($result){
                                    echo 'Autor <b>' . $item['name'] . ' ' . $item['surname'] . '</b> nelze smazat, má články.';
                                } else {
                                    echo 'Opravdu chcete odstranit autora ' . $item['name'] . ' ' . $item['surname'] . '?';
                                }

                                ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <?php if(!$result): ?>
                                        <a href="delete_author?id=<?= $item['id'] ?>" type="button"
                                            class="btn btn-danger">Delete</a>
                                        <?php endif; ?>
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