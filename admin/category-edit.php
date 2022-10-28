<html lang = "en">

<head>
    <?php
    require_once("../config.php");
    require_once ("../lib/userControl.php");

    ?>
    <title>Edit category</title>


</head>
<body>
<div class="container">
    <?php

    $db = DBConnect::setConnection();

    if (isset($_POST['editCategory']) && isset($_POST['categoryName']) ) {

            updateDataDromDb::setCategory(dataValidation::rmvSpclChars($_POST['id']), dataValidation::rmvSpclChars($_POST['categoryName']), dataValidation::rmvSpclChars($_POST['categoryVisibility']), dataValidation::rmvSpclChars($_POST['categoryOrder']));


    }

    //get the category from the DB
    if (isset($_GET['id'])){
        $result = getDataFromDB::getCategoryForEdit($_GET['id']);
//        var_dump($result);exit();
//var_dump($result[0]->body);exit;
//display it in the template
        var_dump($result);exit();
        echo $twig->render('admin/category-edit.html.twig',['category'=>$result[0], 'phpSelf'=>htmlspecialchars($_SERVER['PHP_SELF'])]);
    }

    ?>
</div>
</body>

</html>