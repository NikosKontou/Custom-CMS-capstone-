<html lang = "en">

<head>
    <?php
    require_once("config.php");
    ?>
    <title>Log in page</title>


</head>

<body>

<div class = "container container-main form-signin">

    <?php
    $db= DBConnect::setConnection();
    //check if provided creds are correct
    if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
        $cleanUserName = dataValidation::rmvSpclChars($_POST['username']);
        $cleanPassword = dataValidation::rmvSpclChars($_POST['password']);
        $result = getDataFromDB::userLogIn($cleanUserName);
//            var_dump($result);exit();
        //if credentials are matching save user data in the SESSION
        if(isset($result[0])){

            if (password_verify($cleanPassword, $result[0]->user_password)) {

                $msg = "success";
                //prevent session hijacking by refreshing the session id and adding a cookie
                session_regenerate_id();
                $_SESSION['accessLevel'] = $result[0]->access_level;
                $_SESSION['username'] = $cleanUserName;
                $_SESSION['id'] = $result[0]->id;
                header("Location: /");
            } else{
                $msg= "wrong pass";
            }
        } else{
            $msg= "not set";
            session_destroy();
        }


    }
    ?>
</div> <!-- /container -->
<?php
//call the header template
if(isset($_SESSION['accessLevel'])){
    if($_SESSION['accessLevel']==2){
        require_once("lib/headerFooter/adminMenu.php");
    }
}
require_once("lib/headerFooter/header.php");?>
<div class = "container">

    <?php
    //call the log in template with htmlspecialchars so that user input does not contain special characters
    echo $twig->render('login.html.twig', ['phpSelf'=>htmlspecialchars($_SERVER['PHP_SELF']), 'msg' => (isset($msg)) ? $msg : null]);

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