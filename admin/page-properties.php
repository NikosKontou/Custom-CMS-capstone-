<html lang = "en">

<head>
    <?php
    require_once("../config.php");
    require_once ("../lib/userControl.php");

    ?>
    <title>Page properties</title>


</head>
<body>
<div class="container">
    <?php

    $db = DBConnect::setConnection();

    if (isset($_POST['editProperties'])) {

        updateDataDromDb::setCategory(dataValidation::rmvSpclChars($_POST['id']), dataValidation::rmvSpclChars($_POST['categoryName']), dataValidation::rmvSpclChars($_POST['categoryVisibility']), dataValidation::rmvSpclChars($_POST['categoryOrder']));


    }
    $properties = getDataFromDB::getSiteProperties();
    var_dump($properties);exit();

        echo $twig->render('admin/page-properties.html.twig',['properties'=>$properties, 'phpSelf'=>htmlspecialchars($_SERVER['PHP_SELF'])]);


    ?>
</div>
</body>

</html>