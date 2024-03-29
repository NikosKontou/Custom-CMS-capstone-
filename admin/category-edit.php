<html lang = "en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    require_once("../config.php");
    require_once ("../lib/userControl.php");

    ?>
    <title>Edit category</title>


</head>
<body>
<?php
require_once("../lib/headerFooter/adminMenu.php");
?>
<div class="container container-main">
    <?php

    $db = DBConnect::setConnection();

    if (isset($_POST['editCategory']) && isset($_POST['categoryName']) ) {

            updateDataDromDb::setCategory(dataValidation::rmvSpclChars($_POST['id']), dataValidation::rmvSpclChars($_POST['categoryName']), dataValidation::rmvSpclChars($_POST['categoryVisibility']), dataValidation::rmvSpclChars($_POST['categoryOrder']));


    }

    //get the category from the DB
    if (isset($_GET['id'])){
        $result = getDataFromDB::getSingleCategory($_GET['id']);
        $categoryVisibility = getDataFromDB::getCategoryVisibility($_GET['id']);
//        var_dump($categoryVisibility);exit();
//var_dump($result[0]->body);exit;
//display it in the template
        echo $twig->render('admin/category-edit.html.twig',['category'=>$result[0], 'visibility'=> $categoryVisibility, 'phpSelf'=>htmlspecialchars($_SERVER['PHP_SELF'])]);
    }

    ?>
</div>
</body>

</html>