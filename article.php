<?php
require_once("config.php");

ob_start();
session_start();

?>

<?php
//call the header template
echo $twig->render('header.html.twig', ['username'=>$_SESSION['username'], 'userID'=>$_SESSION['id']]);
//find the requested article
$result = getDataFromDB::getSingleArticle($_GET['id']);
//pass the article obect to the template
echo $twig->render('article.html.twig',['article'=>$result[0]]);


?>