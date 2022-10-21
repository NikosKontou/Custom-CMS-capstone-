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
    echo"<script>console.log('test')</script>";
    if (isset($_POST['createArticle']) && isset($_POST['title']) && isset($_POST['body'])) {

        $target_dir = "../assets/images/";
        $target_file = $target_dir . basename($_FILES["imageToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
            echo"<script>console.log('exists')</script>";
            $uploadOk = 0;
        }

// Check file size
        if ($_FILES["imageToUpload"]["size"] > 700000) {
            echo"<script>console.log('size')</script>";
            $uploadOk = 0;
        }

// Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "svg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo"<script>console.log('mime')</script>";
            $uploadOk = 0;
        }
        if (move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target_file)) {
            echo"<script>console.log('ok')</script>";
            echo "The image ". htmlspecialchars( basename( $_FILES["imageToUpload"]["name"])). " has been uploaded.";
        } else {
            echo"<script>console.log('generic error')</script>";
        }

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