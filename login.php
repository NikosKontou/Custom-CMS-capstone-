<html lang = "en">

<head>
    <?php
    require_once("config.php");

//    phpinfo();    exit();
    ob_start();
    session_start();
    ?>
    <title>Log in page</title>


</head>

<body>

<?php

 echo $twig->render('firstTemplate.html.twig',['user'=>"Heloooo"]);

?>
<div class = "container form-signin">

    <?php
    $msg = '';
    if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
        $sql = 'SELECT user_name FROM users ';
        if (!empty($conn)) {
            $res = $conn->query($sql);
        }
        foreach ($res as $row) {
            if ($_POST['username']==$row["user_name"]){
                $flag =true;
                echo "success";
            }
        }
        if (!isset($flag)){
            echo("failed to log in");
            session_destroy();
        } else{
            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['username'] = $row["user_name"];
        }

    }
    ?>
</div> <!-- /container -->

<div class = "container">

<!--    <form class = "form-signin" role = "form"-->
<!--          action = "--><?php //echo htmlspecialchars($_SERVER['PHP_SELF']);
//          ?><!--" method = "post">-->
<!--        <h4 class = "form-signin-heading">--><?php //echo $msg; ?><!--</h4>-->
<!--        <input type = "text" class = "form-control"             name = "username" placeholder = "username"             required autofocus></br>-->
<!--        <input type = "password" class = "form-control"               name = "password" placeholder = "password" required>-->
<!--        <button class = "btn btn-lg btn-primary btn-block" type = "submit"                name = "login">Login</button>-->
<!--    </form>-->

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