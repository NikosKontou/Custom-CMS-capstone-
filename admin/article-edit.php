<html lang = "en">

<head>
    <?php
    require_once("../config.php");
    ob_start();
    //start the session
    session_start();
    ?>
    <title>Edit article</title>


</head>


<?php

$db = DBConnect::setConnection();

if (isset($_POST['editArticle']) ) {
    exit("article edited!");
}
//get the article from the DB
$result = getDataFromDB::getSingleArticle($_GET['id']);

//display it in the template
echo $twig->render('admin/articles.html.twig',['articles'=>$result, 'phpSelf'=>htmlspecialchars($_SERVER['PHP_SELF'])]);


?>


</html>