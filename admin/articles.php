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
$result = getDataFromDB::getArticles();
//display it in the template
echo $twig->render('admin/articles.html.twig',['articles'=>$result]);

?>
</div>
</body>
</html>

<?php
if(isset($_GET['deleteId'])){
    exit('id is '.$_GET['deleteId']);
}
?>