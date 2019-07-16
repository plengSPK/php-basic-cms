<?php

session_start();
require_once('../includes/connection.php');
require_once('../includes/article.php'); 

$article = new Article;

if(isset($_SESSION['logged_in'])){
    // display delete page
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = $conn->prepare('DELETE FROM articles WHERE article_id=?');
        $query->bindValue(1, $id);

        $query->execute();

        header('Location: delete.php');
        exit();
    }

    $articles = $article->fetch_all();

}else{
    // redirect back to index
    header('Location: index.php');
    exit();
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMS PHP</title>

    <link rel="stylesheet" href="../assets/style.css">
</head>

<body>
    <div class="container">
        <a href="index.php" id="logo">CMS</a>
        <br>

        <h4>Select an Article to Delete: </h4>

        <form action="delete.php" method="get">

            <select onchange="this.form.submit();" name="id">
                <option disabled selected value> -- select an option -- </option>
                <?php foreach($articles as $article): ?>
                    <option value="<?= $article['article_id']; ?>">
                        <?= $article['article_title']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

        </form>

    </div>
</body>
</html>