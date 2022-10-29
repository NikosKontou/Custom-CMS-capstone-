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
        $cleanUserName = dataValidation::rmvSpclChars($_POST['username']);
        $cleanPassword = dataValidation::rmvSpclChars($_POST['password']);
        $result = insertDataToDB::userRegister($cleanUserName, $cleanPassword);

    }
    ?>
</div> <!-- /container -->
<?php
//call the header template
if($_SESSION['accessLevel']==2){
    require_once("lib/headerFooter/adminMenu.php");
}
require_once("lib/headerFooter/header.php");?>
<div class = "container">

    <?php
    //call the register template
    echo $twig->render('register.html.twig', ['phpSelf'=>htmlspecialchars($_SERVER['PHP_SELF']), 'msg' => (isset($msg)) ? $msg : null]);

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