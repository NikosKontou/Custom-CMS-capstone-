<html lang = "en">

<head>
    <?php
    require_once("../config.php");
    require_once ("../lib/userControl.php");
    ?>
    <title>Articles managment</title>


</head>
<body>
<div class="container">
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
        echo('deletion was a success');
    }
}
?>