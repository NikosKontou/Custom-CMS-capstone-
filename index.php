<?php
require_once("config.php");
function __autoload($class) {
    require LIBRARY . $class .".php";
}

ob_start();
session_start();
?>



<html lang = "en">

<head>
    <title>Log in page</title>
    <link href = "css/bootstrap.min.css" rel = "stylesheet">


</head>

<body>

<h2>Log in to continue</h2>
<div class = "container form-signin">

    <?php
    $msg = '';

    if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {


    }
    ?>
</div> <!-- /container -->

<div class = "container">

    <form class = "form-signin" role = "form"
          action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
          ?>" method = "post">
        <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
        <input type = "text" class = "form-control"
               name = "username" placeholder = "username"
               required autofocus></br>
        <input type = "password" class = "form-control"
               name = "password" placeholder = "password" required>
        <button class = "btn btn-lg btn-primary btn-block" type = "submit"
                name = "login">Login</button>
    </form>


</div>

</body>
</html>