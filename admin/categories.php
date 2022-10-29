<html lang = "en">

<head>
    <?php
    require_once("../config.php");
    require_once ("../lib/userControl.php");
    ?>
    <title>Category managment</title>


</head>
<body>
<?php
require_once("../lib/headerFooter/adminMenu.php")
?>
<div class="container">
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
        echo('deletion was a success');
    }
}
?>