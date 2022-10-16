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

if (isset($_POST['editArticle']) && isset($_POST['title']) && isset($_POST['body'])) {

    updateDataDromDb::setSingleArticle($_GET['id'], $_POST['title'], $_POST['body']);
}

//get the article from the DB
$result = getDataFromDB::getSingleArticle($_GET['id']);
//var_dump($result[0]->body);exit;
//display it in the template
echo $twig->render('admin/article-edit.html.twig',['article'=>$result[0], 'phpSelf'=>htmlspecialchars($_SERVER['PHP_SELF'])]);


?>


</html>