<?php
require_once("config.php");
ob_start();
session_start();
$result = getDataFromDB::getSingleArticle($_GET['id']);
echo $twig->render('article.html.twig',['article'=>$result]);


?>