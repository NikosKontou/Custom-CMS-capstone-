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
    //initialize $msg
    $msg = '';
    //check if provided creds are correct
    if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
        $select = $db->prepare('SELECT * FROM users');
        $select->execute();
        while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
            //if credentials are matching save user data in the SESSION
            if ($_POST['username']==$row["user_name"]){
                $msg= "success";
                $_SESSION['username'] = $row["user_name"];
                $_SESSION['id'] = $row['id'];
            }
        }
        //else destroy the SESSION
        if (!isset($_SESSION['id'])){
            echo("failed to log in");
            session_destroy();
        }

    }
    ?>
</div> <!-- /container -->

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