<html lang = "en">

<head>
    <?php
    require_once("../config.php");
    require_once ("../lib/userControl.php");

    ?>
    <title>New article</title>


</head>
<body>
<div class="container">
    <?php

    $db = DBConnect::setConnection();

    if (isset($_POST['createArticle']) && isset($_POST['title']) && isset($_POST['body'])) {

        insertDataToDB::createArticle($_POST['title'], $_POST['body']);
    }

//var_dump($result[0]->body);exit;
//get the same template used to update an article but pass no article data
    //phpself is important so that the php file can get the post request from the twig template
        echo $twig->render('admin/article-edit.html.twig',['phpSelf'=>htmlspecialchars($_SERVER['PHP_SELF'])]);


    ?>
</div>
</body>

</html>