<html lang="en">

<head>
    <?php
    require_once("config.php");
    if (isset($_GET['c'])){
        $categoryName = htmlspecialchars($_GET['c']);
    }

    ?>
<!--    display the current category name-->
    <title><?php echo $categoryName?></title>

</head>
<body>

<?php
if (isset($_SESSION['accessLevel'])) {
    if ($_SESSION['accessLevel'] == 2) {
        require_once("lib/headerFooter/adminMenu.php");
    }
}

//set color option from siteItems
Session::setSiteColors();
//manage paggination
$pager ='';
if (isset($_GET['p'])){
    $pager=((int)htmlspecialchars($_GET['p']))*3;
    $result = getDataFromDB::getCategoryArticles($categoryName, $pager);
}else{
    $pager=0;
    $result = getDataFromDB::getCategoryArticles($categoryName);
}
require_once("lib/headerFooter/header.php");
echo("<div class='container'>");
//get every article from the DB

//display it in the template
echo $twig->render('category-name.html.twig', ['categoryName' => htmlspecialchars($_GET['c'])]);
echo $twig->render('index.html.twig', ['articles' => $result]);
echo $twig->render('pagination.html.twig', ['categoryName'=>$categoryName, 'accentColor'=>$_SESSION['accent_color'], 'currentPage'=>isset($_GET['p'])?(int)htmlspecialchars($_GET['p']):0]);

?>
</div>
</body>
<?php
require_once("lib/headerFooter/footer.php");
?>
</html>

<?php
if (isset($_POST['logOut'])) {
    session_destroy();
    header("location:../index.php");
}
?>