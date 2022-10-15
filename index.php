<html lang = "en">

<head>
    <?php
    require_once("config.php");
    ob_start();
    session_start();
    ?>
    <title>index</title>


</head>


<?php
$result = getDataFromDB::getArticles();
echo $twig->render('index.html.twig',['articles'=>$result]);


?>


</html>