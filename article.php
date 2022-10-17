<html lang = "en">

<head>
    <?php
    require_once("config.php");
    ?>
    <title>Log in page</title>


</head>

<body>

<?php
//call the header template
//if the session variables are not set, pass null
echo $twig->render('header.html.twig', ['username'=>(isset($_SESSION['username']))?$_SESSION['username']: null, 'userID'=>(isset($_SESSION['id']))?$_SESSION['id']: null]);
echo("<div class='container'>");
//find the requested article
$result = getDataFromDB::getSingleArticle($_GET['id']);
//pass the article obect to the template
echo $twig->render('article.html.twig',['article'=>$result[0]]);

?>
</div>
</body>
</html>

