<html lang = "en">

<head>
    <?php
    require_once("config.php");
    ob_start();
    session_start();
    ?>
    <title>index</title>


</head>

<body>

<?php
var_dump(getDataFromDB());

?>


</body>
</html>