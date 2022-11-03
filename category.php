<html lang="en">

<head>
    <?php
    require_once("config.php");

    ?>
<!--    display the current category name-->
    <title><?php echo htmlspecialchars($_GET['c'])?></title>

</head>
<body>

<?php
if (isset($_SESSION['accessLevel'])) {
    if ($_SESSION['accessLevel'] == 2) {
        require_once("lib/headerFooter/adminMenu.php");
    }
}

require_once("lib/headerFooter/header.php");
echo("<div class='container'>");
//get every article from the DB
$result = getDataFromDB::getCategoryArticles($_GET['c']);
//display it in the template
echo $twig->render('category-name.html.twig', ['categoryName' => htmlspecialchars($_GET['c'])]);
echo $twig->render('index.html.twig', ['articles' => $result]);

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