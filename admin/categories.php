<html lang = "en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    require_once("../config.php");
    require_once ("../lib/userControl.php");
    ?>
    <title>Category managment</title>


</head>
<body>
<?php
require_once("../lib/headerFooter/adminMenu.php");
?>
<div class="container container-main">

    <?php
    //get every category from the DB
    $result = getDataFromDB::getCategories();
    //display it in the template
    echo $twig->render('admin/categories.html.twig',['categories'=>$result]);

    ?>
</div>
</body>
</html>

<?php
//get the id for deletion from post
if(isset($_GET['deleteId'])){
    $res = deleteDataFromDB::deleteCategory(dataValidation::rmvSpclChars($_GET['deleteId']));
    if ($res!=false){
        header("Refresh:0");
        echo("<script>window.alert('Category successfully deleted')</script>");
    }
}
?>