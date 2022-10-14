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
$result = getDataFromDB::getArticles();
print_r($result);

?>


</body>
</html>