<html lang = "en">

<head>
    <?php
    require_once("config.php");
    ?>
    <title>Log in page</title>


</head>

<body>

<?php
if(isset($_SESSION['accessLevel'])){
    if($_SESSION['accessLevel']==2){
        require_once("lib/headerFooter/adminMenu.php");
    }
}
//call the header template
//if the session variables are not set, pass null
require_once("lib/headerFooter/header.php");
echo("<div class='container container-main'>");
//find the requested article
$result = getDataFromDB::getSingleArticle($_GET['id']);
//pass the article obect to the template
echo $twig->render('article.html.twig',['article'=>$result[0]]);

?>
</div>
</body>
<?php
require_once("lib/headerFooter/footer.php");
?>
</html>

<?php
if (isset($_POST['logOut'])) {
    session_destroy();
    header("location:../index.php");
}
?>