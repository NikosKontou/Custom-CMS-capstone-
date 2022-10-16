<html lang = "en">

<head>
    <?php
    require_once("config.php");

    ?>
    <title>index</title>


</head>


<?php
//get every article from the DB
$result = getDataFromDB::getArticles();
//display it in the template
echo $twig->render('index.html.twig',['articles'=>$result]);


?>


</html>