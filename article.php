<?php
require_once("config.php");

ob_start();
session_start();

?>

<?php
echo $twig->render('header.html.twig', ['userID'=>$_SESSION['username']]);
$result = getDataFromDB::getSingleArticle($_GET['id']);
echo $twig->render('article.html.twig',['article'=>$result[0]]);


?>