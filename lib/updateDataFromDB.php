<?php

class updateDataDromDb
//every update database job should be stored here and called via the class as a static function
{

    public static function setSingleArticle($id, $title, $body, $image, $CID): void
    {
        try {
            //set an article
            $db = DBConnect::setConnection();
            $update = $db->prepare("update articles set title = :title,body= :body, header_image= :image, category_id = :category_id where id = :id");

            $update->bindParam('title', $title, PDO::PARAM_STR);
            $update->bindParam('body', $body, PDO::PARAM_STR);
            $update->bindParam('image', $image, PDO::PARAM_STR);
            $update->bindParam('id', $id, PDO::PARAM_INT);
            $update->bindParam('category_id', $CID, PDO::PARAM_STR);
//        var_dump($update);exit();
            $update->execute();

            // echo a message to say the UPDATE succeeded
            echo $update->rowCount() . " records UPDATED successfully";
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }

    public static function setSingleArticleWithoutImage($id, $title, $body, $CID): void
    {
        try {
            //set an article
            $db = DBConnect::setConnection();
            $update = $db->prepare("update articles set title = :title, body= :body, category_id = :category_id where id = :id");

            $update->bindParam('title', $title, PDO::PARAM_STR);
            $update->bindParam('body', $body, PDO::PARAM_STR);
            $update->bindParam('id', $id, PDO::PARAM_INT);
            $update->bindParam('category_id', $CID, PDO::PARAM_STR);
//        var_dump($update);exit();
            $update->execute();

            // echo a message to say the UPDATE succeeded
            echo $update->rowCount() . " records UPDATED successfully";
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }

    public static function setCategory($id, $cat_name, $cat_visibility, $cat_order): void
    {
        try {
            //set an article
            $db = DBConnect::setConnection();
            $update = $db->prepare("update categories set category_name = :category_name, visibility = :visibility, ordering = :ordering where id = :id");

            $update->bindParam('category_name', $cat_name, PDO::PARAM_STR);
            $update->bindParam('id', $id, PDO::PARAM_INT);
            $update->bindParam('visibility', $cat_visibility, PDO::PARAM_INT);
            $update->bindParam('ordering', $cat_order, PDO::PARAM_INT);
//        var_dump($update);exit();
            $update->execute();

            // echo a message to say the UPDATE succeeded
            echo $update->rowCount() . " records UPDATED successfully";
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }


}