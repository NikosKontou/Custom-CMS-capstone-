<html lang="en">

<head>
    <?php
    require_once("config.php");

    ?>
    <title>index</title>

</head>
<body>

<?php

//call the header template
//if the session variables are not set, pass null with the ternary operator
if($_SESSION['accessLevel']==2){
    require_once("lib/headerFooter/adminMenu.php");
}
require_once("lib/headerFooter/header.php");
echo("<div class='container'>");
//get every article from the DB
$result = getDataFromDB::getArticles();
//display it in the template
echo $twig->render('index.html.twig', ['articles' => $result]);

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