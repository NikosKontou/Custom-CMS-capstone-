<html lang = "en">

<head>
    <?php
    require_once("../config.php");
    ob_start();
    //start the session
    session_start();
    ?>
    <title>Articles managment</title>


</head>


<?php
//get every article from the DB
$result = getDataFromDB::getArticles();
//display it in the template
echo $twig->render('admin/articles.html.twig',['articles'=>$result]);


?>


</html>