<?php

class insertDataToDB
//every update database job should be stored here and called via the class as a static function
{

    public static function createArticle($title, $body, $image, $CID, $UID, $promotedBox)
    {
        try {
            //set an article
            $db = DBConnect::setConnection();
            $insert = $db->prepare('insert into articles (title, body, header_image, category_id, created_by, created_time, promoted) values (:title, :body, :image, :category, :created_by, :time, :promoted)');

            $insert->bindParam('title', $title, PDO::PARAM_STR);
            $insert->bindParam('body', $body, PDO::PARAM_STR);
            $insert->bindParam('image', $image, PDO::PARAM_STR);
            $insert->bindParam('created_by', $UID, PDO::PARAM_INT);
            $insert->bindParam('category', $CID, PDO::PARAM_INT);
            $insert->bindParam('promoted', $promotedBox, PDO::PARAM_INT);
            $time = session::getCurrentTimestamp();
            $insert->bindParam('time', $time, PDO::PARAM_STR);
//        var_dump($update);exit();
            $insert->execute();

        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }

    public static function userRegister($username, $password)
    {
        try {
            $encrypted_password = password_hash($password, PASSWORD_BCRYPT);
            $db = DBConnect::setConnection();
            $insert = $db->prepare('insert into users (user_name, user_password) values (:username, :password)');
            $insert->bindParam('username', $username, PDO::PARAM_STR);
            $insert->bindParam('password', $encrypted_password);
            $insert->execute();
            return "successfully register with username ".$username;
//            return $insert->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return "error, user exists";
//            echo "<br>" . $e->getMessage();
        }
    }

    public static function createCategory($name, $cat_visibility, $cat_order)
    {
        try {
            //set an article
            $db = DBConnect::setConnection();
            $insert = $db->prepare('insert into categories (category_name, visibility, ordering) values (:name, :visibility, :ordering)');

            $insert->bindParam('name', $name, PDO::PARAM_STR);
            $insert->bindParam('visibility', $cat_visibility, PDO::PARAM_INT);
            $insert->bindParam('ordering', $cat_order, PDO::PARAM_INT);
            $insert->execute();

        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }


    public static function createArticleWithoutImage($title, $body, $CID, $UID, $promotedBox)
    {
        try {
            //set an article
            $db = DBConnect::setConnection();
            $insert = $db->prepare('insert into articles (title, body, category_id, created_by, created_time, promoted) values (:title, :body, :category, :created_by, :time, :promoted)');

            $insert->bindParam('title', $title, PDO::PARAM_STR);
            $insert->bindParam('body', $body, PDO::PARAM_STR);
            $insert->bindParam('created_by', $UID, PDO::PARAM_INT);
            $insert->bindParam('created_by', $UID, PDO::PARAM_INT);
            $insert->bindParam('category', $CID, PDO::PARAM_INT);
            $insert->bindParam('promoted', $promotedBox, PDO::PARAM_INT);
            $time = session::getCurrentTimestamp();
            $insert->bindParam('time', $time, PDO::PARAM_STR);
//        var_dump($update);exit();
            $insert->execute();

        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }

}