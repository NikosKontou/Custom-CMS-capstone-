<html lang = "en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    require_once("../config.php");
    require_once ("../lib/userControl.php");
    ?>
    <title>Articles managment</title>


</head>
<body>
<?php
require_once("../lib/headerFooter/adminMenu.php");
?>
<div class="container container-main">

<?php
//get every article from the DB
$result = getDataFromDB::getArticlesForEdit();
//display it in the template
echo $twig->render('admin/articles.html.twig',['articles'=>$result]);

?>
</div>
</body>
</html>

<?php
if(isset($_GET['deleteId'])){
    $res = deleteDataFromDB::deleteArticle($_GET['deleteId']);
    if ($res!=false){
        header("Refresh:0");
        echo("<script>window.alert('Article successfully deleted')</script>");
    }
}
?>