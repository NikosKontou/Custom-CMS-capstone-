<html lang="en">

<head>
    <?php
    require_once("config.php");

    ?>
    <title>Home</title>

</head>
<body>

<?php

if (isset($_SESSION['accessLevel'])) {
    if ($_SESSION['accessLevel'] == 2) {
        require_once("lib/headerFooter/adminMenu.php");
    }
}
//manage paggination
$pager ='';
if (isset($_GET['p'])){
    $pager==htmlspecialchars($_GET['p'])*10;

}else{
    $pager=0;
}
$promotedRes = getDataFromDB::getPromotedArticles();
//print_r($promotedRes);exit;
//call the header template
//if the session variables are not set, pass null with the ternary operator

require_once("lib/headerFooter/header.php");
echo("<div class='container'>");
echo $twig->render('promoted.html.twig', ['promoted' => $promotedRes]);
//get every article from the DB
$result = getDataFromDB::getArticles($pager['$nextOffset']);
//display it in the template
echo $twig->render('index.html.twig', ['articles' => $result]);
echo $twig->render('pagination.html.twig', ['currentPage'=>htmlspecialchars($_GET['p'])]);

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