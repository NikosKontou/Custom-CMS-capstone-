<html lang = "en">

<head>
    <?php
    require_once("config.php");

    ob_start();
    session_start();
    ?>
    <title>Log in page</title>


</head>

<body>

<?php

?>
<div class = "container form-signin">

    <?php
    $db= DBConnect::setConnection();
    $msg = '';
    if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
        $select = $db->prepare('SELECT user_name FROM users');
        $select->execute();
        while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
            if ($_POST['username']==$row["user_name"]){
                $flag =true;
                echo "success";
                $_SESSION['username'] = $row["user_name"];
            }
        }
        if (!isset($flag)){
            echo("failed to log in");
            session_destroy();
        } else{
            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();

        }

    }
    ?>
</div> <!-- /container -->

<div class = "container">


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