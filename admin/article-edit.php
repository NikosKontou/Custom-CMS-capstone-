<html lang = "en">

<head>
    <?php
    require_once("../config.php");
    require_once ("../lib/userControl.php");

    ?>
    <title>Edit article</title>


</head>


<?php

$db = DBConnect::setConnection();

if (isset($_POST['editArticle']) && isset($_POST['title']) && isset($_POST['body'])) {

    updateDataDromDb::setSingleArticle($_POST['id'], $_POST['title'], $_POST['body']);
}

//get the article from the DB
if (isset($_GET['id'])){
    $result = getDataFromDB::getSingleArticle($_GET['id']);

//var_dump($result[0]->body);exit;
//display it in the template
    echo $twig->render('admin/article-edit.html.twig',['article'=>$result[0], 'phpSelf'=>htmlspecialchars($_SERVER['PHP_SELF'])]);
}




?>


</html>