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
    //initialize $msg
    $msg = '';
    //check if provided creds are correct
    if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
            $result = getDataFromDB::userLogIn($_POST['username']);
//            var_dump($result);exit();
            //if credentials are matching save user data in the SESSION
        if(isset($result[0])){
            if ($_POST['password']==$result[0]->user_password) {

                $msg = "success";
                //prevent session hijacking by refreshing the session id and adding a cookie
                session_regenerate_id();
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['id'] = $result[0]->id;
            } else{
                $msg= "wrong credentials";
            }
        } else{
            $msg= "wrong credentials";
            session_destroy();
        }


    }
    ?>
</div> <!-- /container -->
<?php
//call the header template
echo $twig->render('header.html.twig', ['username'=>$_SESSION['username'], 'userID'=>$_SESSION['id']]);
?>
<div class = "container">

<!--html form with post request to the same page (login.php)-->
    <form role = "form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method = "post">
        <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
        <div class="form-group">
            <label for="username">username</label>
            <input type="username" class="form-control" name="username" id="username" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="username help" class="form-text text-muted">Log in to access more admin options.</small>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>
        <button name = "login" type="submit" class="btn btn-primary">Login</button>
    </form>


</div>


</body>
</html>