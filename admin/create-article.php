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

    //get the article from the DB

        $result = getDataFromDB::getSingleArticle($_GET['id']);

//var_dump($result[0]->body);exit;
//display it in the template
        echo $twig->render('admin/article-edit.html.twig',['article'=>$result[0], 'phpSelf'=>htmlspecialchars($_SERVER['PHP_SELF'])]);


    ?>
</div>
</body>

</html>