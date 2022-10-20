<html lang = "en">

<head>
    <?php
    require_once("config.php");
    ?>
    <title>Log in page</title>


</head>

<body>

<div class = "container form-signin">

    <?php
    $db= DBConnect::setConnection();

    if (isset($_POST['register']) && !empty($_POST['username']) && !empty($_POST['password'])) {
        $result = insertDataToDB::userREgister($_POST['username'], $_POST['password']);

    }
    ?>
</div> <!-- /container -->
<?php
//call the header template
echo $twig->render('header.html.twig', ['phpSelf'=>htmlspecialchars($_SERVER['PHP_SELF']), 'username' => (isset($_SESSION['username'])) ? $_SESSION['username'] : null, 'userID' => (isset($_SESSION['id'])) ? $_SESSION['id'] : null]);
?>
<div class = "container">

    <?php
    //call the register template
    echo $twig->render('login.html.twig', ['phpSelf'=>htmlspecialchars($_SERVER['PHP_SELF']), 'username' => (isset($msg)) ? $msg : null]);

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