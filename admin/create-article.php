<html lang = "en">

<head>
    <?php
    require_once("../config.php");
    require_once ("../lib/userControl.php");

    ?>
    <title>New article</title>


</head>
<body>
<?php
require_once("../lib/headerFooter/adminMenu.php")
?>
<div class="container">
    <?php

    $db = DBConnect::setConnection();
    echo"<script>console.log('test')</script>";
    if (isset($_POST['createArticle']) && isset($_POST['title']) && isset($_POST['body']) &&isset($_POST['categorySelector'])) {
        //if file size is smaller than one byte, do not upload the image
        if ($_FILES['imageToUpload']['size']>1) {
            if (dataValidation::imageCheck($_FILES['imageToUpload'])) {
                insertDataToDB::createArticle($_POST['title'], $_POST['body'], htmlspecialchars(basename($_FILES["imageToUpload"]["name"])), $_POST['categorySelector'], $_SESSION['id']);
            }
        } else{
            insertDataToDB::createArticleWithoutImage($_POST['title'], $_POST['body'], $_POST['categorySelector'], $_SESSION['id']);

        }
    }

    //    if GET[id] isset then pass it to the function, otherwise pass nothing
    if (isset($_GET['id'])){
        $categoryList=getDataFromDB::getSelectedArticleCategory($_GET['id']);
    } else {
        $categoryList = getDataFromDB::getSelectedArticleCategory();
    }
    //var_dump($result[0]->body);exit;
    //get the same template used to update an article but pass no article data
    //phpself is important so that the php file can get the post request from the twig template
    echo $twig->render('admin/article-edit.html.twig',['phpSelf'=>htmlspecialchars($_SERVER['PHP_SELF']), 'categoryList'=>$categoryList]);


    ?>
</div>
</body>

</html>