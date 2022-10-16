<?php
class insertDataToDB
//every update database job should be stored here and called via the class as a static function
{

    public static function createArticle($title, $body)
    {   try{
        //set an article
        $db= DBConnect::setConnection();
        $insert = $db->prepare('insert into articles (title, body) values (:title, :body)');

        $insert->bindParam('title', $title, PDO::PARAM_STR);
        $insert->bindParam('body', $body, PDO::PARAM_STR);
//        var_dump($update);exit();
        $insert->execute();

    } catch(PDOException $e) {
        echo "<br>" . $e->getMessage();
    }
    }

}