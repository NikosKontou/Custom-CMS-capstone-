<html lang = "en">

<head>
    <?php
    require_once("../config.php");
    require_once ("../lib/userControl.php");

    ?>
    <title>New category</title>


</head>
<body>
<?php
require_once("lib/headerFooter/adminMenu.php");
?>
<div class="container">
    <?php

    $db = DBConnect::setConnection();
    if (isset($_POST['createCategory']) && isset($_POST['categoryName'])) {

        insertDataToDB::createCategory( dataValidation::rmvSpclChars($_POST['categoryName']), dataValidation::rmvSpclChars($_POST['categoryVisibility']), dataValidation::rmvSpclChars($_POST['categoryOrder']));

    }
//    if GET[id] isset then pass it to the function, otherwise pass nothing
    if (isset($_GET['id'])){
        $categoryVisibility = getDataFromDB::getCategoryVisibility($_GET['id']);
    }else{
        $categoryVisibility = getDataFromDB::getCategoryVisibility();
    }
    echo $twig->render('admin/category-edit.html.twig',['phpSelf'=>htmlspecialchars($_SERVER['PHP_SELF']), 'visibility'=> $categoryVisibility]);


    ?>
</div>
</body>

</html>