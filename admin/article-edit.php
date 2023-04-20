<html lang = "en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    require_once("../config.php");
    require_once ("../lib/userControl.php");

    ?>
    <title>Edit article</title>


</head>
<body>
<?php
require_once("../lib/headerFooter/adminMenu.php");
?>

<div class="container container-main">
<?php

$db = DBConnect::setConnection();

if (isset($_POST['editArticle']) && isset($_POST['title']) && isset($_POST['body'])) {
    $promotedBox= (isset($_POST['promotedBox']))?'1':'0';

    if(($_FILES['imageToUpload']['size']> 1)){
        if (dataValidation::imageCheck($_FILES['imageToUpload'])) {
//            var_dump($_POST['categorySelector']);exit;
            updateDataDromDb::setSingleArticle($_POST['id'], $_POST['title'], $_POST['body'], $_FILES['imageToUpload']["name"], $_POST['categorySelector'], $promotedBox);
        }
    }else{
//        var_dump($_POST['categorySelector']);exit;
        updateDataDromDb::setSingleArticleWithoutImage($_POST['id'], $_POST['title'], $_POST['body'], $_POST['categorySelector'], $promotedBox);
    }
}

//get the article from the DB
if (isset($_GET['id'])){
    $categoryList=getDataFromDB::getSelectedArticleCategory($_GET['id']);
    $result = getDataFromDB::getSingleArticle($_GET['id']);

//        var_dump($result);exit();
//var_dump($result[0]->body);exit;
//display it in the template
    echo $twig->render('admin/article-edit.html.twig',['categoryList'=>$categoryList, 'article'=>$result[0], 'phpSelf'=>htmlspecialchars($_SERVER['PHP_SELF'])]);
}

?>
</div>
</body>

</html>