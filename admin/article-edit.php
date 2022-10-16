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
//get the article from the DB
$result = getDataFromDB::getSingleArticle();
//display it in the template
echo $twig->render('admin/article-edit.html.twig',['article'=>$result]);


?>


</html>