<html lang="en">

<head>
    <?php
    require_once("config.php");

    ?>
    <title>index</title>

</head>
<body>

<?php
//call the header template
//if the session variables are not set, pass null with the ternary operator
echo $twig->render('header.html.twig', ['menuItems'=> $_SESSION['menu_items'], 'phpSelf'=>htmlspecialchars($_SERVER['PHP_SELF']), 'username' => (isset($_SESSION['username'])) ? $_SESSION['username'] : null, 'userID' => (isset($_SESSION['id'])) ? $_SESSION['id'] : null] );
echo("<div class='container'>");
//get every article from the DB
$result = getDataFromDB::getArticles();
//display it in the template
echo $twig->render('index.html.twig', ['articles' => $result]);

?>
</div>
</body>
</html>

<?php
if (isset($_POST['logOut'])) {
   session_destroy();
   header("location:../index.php");
}
?>