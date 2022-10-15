<?php
require_once("config.php");

ob_start();
session_start();

?>

<?php

$result = getDataFromDB::getSingleArticle($_GET['id']);
echo $twig->render('article.html.twig',['article'=>$result[0]]);


?>