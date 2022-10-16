<html lang = "en">

<head>
    <?php
    require_once("config.php");

    ?>
    <title>index</title>


</head>
<body>
<div class='container'>
<?php
//call the header template
echo $twig->render('header.html.twig', ['username'=>$_SESSION['username'], 'userID'=>$_SESSION['id']]);
//get every article from the DB
$result = getDataFromDB::getArticles();
//display it in the template
echo $twig->render('index.html.twig',['articles'=>$result]);

?>
</div>
</body>
</html>