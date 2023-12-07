<!DOCTYPE html>
<html lang="en">

<?php 
    require_once 'db.php';

    session_start();

    if(!isset($_SESSION['user'])){
        header('Location: index');
        die();
    }

    $sql = 'SELECT * FROM authors';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $authors = $stmt->fetchAll();

    $sql2 = 'SELECT * FROM category';
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();
    $categories = $stmt2->fetchAll();



    if(isset($_POST['author'], $_POST['category'], $_POST['title'], $_POST['pretext'], $_POST['text'])){
        $sql = 'INSERT INTO articles VALUES(default, :author_id, :category_id, :title, :pretext, :content, default, 1)';
        $stmt = $conn ->prepare($sql);
        $stmt -> execute([
            ':author_id' => $_POST['author'],
            ':category_id' => $_POST['category'],
            ':title' => $_POST['title'],
            ':pretext' => $_POST['pretext'],
            ':content' => $_POST['text'],
        ]);
        header("Location: index");
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
    <script src="./node_modules/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
    tinymce.init({
        selector: '#mytextarea'
    });
    </script>
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
                <a href="admin_post" class="nav-item">Administrace článků</a>
                <a href="add_post" class="nav-item active">Přidat článek</a>
                <a href="logout" class="nav-item">Odhlásit se</a>
                <?php else: ?>
                    <a href="login" class="nav-item">Přihlásit se</a>
                    <a href="register" class="nav-item">Vytvořit účet</a>
                <?php endif; ?>
            </nav>
        </header>
        <main class="py-3" id="main">
            <section class="row flex-row-reverse justify-content-center">
                <div class="col">
                    <form action="" method="post" class="row g-3">
                        <div class="col-md-6">
                            <label for="author_input" class="form-label">Author</label>
                            <select name="author" id="author_input" class="form-select">
                                <?php foreach($authors as $item): ?>
                                <option value="<?= $item['id'] ?>"><?= $item['name'] . ' ' . $item['surname'] ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="kategorie_input" class="form-label">Kategorie</label>
                            <select name="category" id="kategorie_input" class="form-select">
                                <?php foreach($categories as $item): ?>
                                <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="title_input" class="form-label">Title</label>
                            <input type="text" id="title_input" name="title" class="form-control">
                        </div>
                        <div class="col-12">
                            <label for="text_input" class="form-label">Pre Text</label>
                            <input type="text" id="text_input" name="pretext" class="form-control">
                        </div>
                        <textarea name="text" id="mytextarea"></textarea>
                        <button class="btn btn-oxford">Send</button>
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