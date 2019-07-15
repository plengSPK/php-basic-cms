<?php 

require_once('includes/connection.php');  
require_once('includes/article.php'); 

$article = new Article;
$articles = $article->fetch_all();

// echo md5('password');
// echo password_hash('password',PASSWORD_DEFAULT);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMS PHP</title>

    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <a href="index.php" id="logo">CMS</a>
        <ol>
            <?php foreach($articles as $article): ?>
                <li>
                    <a href="article.php?id=<?= $article['article_id']; ?>">
                        <?= $article['article_title']; ?>
                    </a>
                    - <small>
                        <!-- convert number to date by format [day of a week, date, month] -->
                        <?= date('l jS F', $article['article_timestamp']); ?>
                    </small>
                </li>
            <?php endforeach; ?>
        </ol>

        <br>
        <small><a href="admin">admin</a></small>

    </div>
</body>
</html>