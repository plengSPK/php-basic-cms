<?php 

require_once('includes/connection.php');  
require_once('includes/article.php'); 

$article = new Article;
$data = "";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $article->fetch_data($id);

}else{
    header('Location: index.php');
    exit();
}

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
        
        <h4>
            <?= $data['article_title']; ?>
            - <small>
                posted <?= date('l jS F', $data['article_timestamp']); ?>
            </small>
        </h4>
        <p><?= $data['article_content']; ?></p>
        <a href="index.php">&larr; Back</a>

    </div>
</body>
</html>