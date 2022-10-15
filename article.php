<?php
require_once("config.php");

ob_start();
session_start();

?>
    {% include 'templates/header.html.twig' %}
<?php

$result = getDataFromDB::getSingleArticle($_GET['id']);
echo $twig->render('article.html.twig',['article'=>$result[0]]);


?>