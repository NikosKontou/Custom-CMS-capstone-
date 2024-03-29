<?php

class updateDataDromDb
//every update database job should be stored here and called via the class as a static function
{

    public static function setSingleArticle($id, $title, $body, $image, $CID, $checkBox): void
    {
        try {
            //set an article from edit form
            $db = DBConnect::setConnection();
            $update = $db->prepare("update articles set last_edit= :lastEdit, title = :title,body= :body, header_image= :image, category_id = :category_id, promoted = :promoted where id = :id");
            $now= date("Y-m-d H:i:s");
            $update->bindParam('title', $title, PDO::PARAM_STR);
            $update->bindParam('body', $body, PDO::PARAM_STR);
            $update->bindParam('image', $image, PDO::PARAM_STR);
            $update->bindParam('id', $id, PDO::PARAM_INT);
            $update->bindParam('promoted', $checkBox, PDO::PARAM_INT);
            $update->bindParam('category_id', $CID, PDO::PARAM_STR);
            $update->bindParam('lastEdit',$now , PDO::PARAM_STR);
            $update->execute();

            // echo a message to say the UPDATE succeeded
            echo $update->rowCount() . " records UPDATED successfully";
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }

    public static function setSingleArticleWithoutImage($id, $title, $body, $CID, $checkBox): void
    {
        try {
            //set an article
            $db = DBConnect::setConnection();
            $update = $db->prepare("update articles set last_edit= :lastEdit, title = :title, body= :body, category_id = :category_id, promoted = :promoted  where id = :id");
            $now= date("Y-m-d H:i:s");
            $update->bindParam('title', $title, PDO::PARAM_STR);
            $update->bindParam('body', $body, PDO::PARAM_STR);
            $update->bindParam('id', $id, PDO::PARAM_INT);
            $update->bindParam('promoted', $checkBox, PDO::PARAM_INT);
            $update->bindParam('category_id', $CID, PDO::PARAM_STR);
            $update->bindParam('lastEdit',$now , PDO::PARAM_STR);
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

    public static function setPageProperties($facebook,
    $instagram, $email, $siteName, $siteColor, $siteLogo, $siteSlogan, $address, $twitter, $facebookBox, $instagramBox, $twitterBox, $phone, $phoneBox, $siteInfo, $accentColor)
    {
        //update with "case" in order to not make multiple requests to the DB
        $db = DBConnect::setConnection();
        try {
            $where = "where id = 1 or id =2 or id =3 or id =4 or id =5 or id =6 or id =7 or id =8 or id =10 or id=11 or id=12 or id=13";
            $update = $db->prepare("update site_properties set value = CASE" .
                " WHEN id=1 THEN '" . $facebook .
                "' WHEN id=2 THEN '" . $instagram .
                "' WHEN id=3 THEN '" . $email .
                "' WHEN id=4 THEN '" . $siteName .
                "' WHEN id=5 THEN '" . $siteColor .
                "' WHEN id=6 THEN '" . $siteLogo .
                "' WHEN id=7 THEN '" . $siteSlogan .
                "' WHEN id=8 THEN '" . $address .
                "' WHEN id=10 THEN '" . $twitter .
                "' WHEN id=11 THEN '" . $phone .
                "' WHEN id=12 THEN '" . $siteInfo .
                "' WHEN id=13 THEN '" . $accentColor .
                "' END ".$where);
            $update->execute();
            echo $update->rowCount() . " records UPDATED successfully";
            $update = $db->prepare("update site_properties set visibility = CASE" .
                " WHEN id=1 THEN " . $facebookBox .
                " WHEN id=2 THEN " . $instagramBox .
                " WHEN id=3 THEN 1".
                " WHEN id=4 THEN 1".
                " WHEN id=5 THEN 1".
                " WHEN id=6 THEN 1".
                " WHEN id=7 THEN 1".
                " WHEN id=8 THEN 1".
                " WHEN id=10 THEN " . $twitterBox .
                " WHEN id=11 THEN " . $phoneBox .
                " WHEN id=12 THEN 1" .
                " WHEN id=13 THEN 1" .
                " END ".$where);
            $update->execute();
            echo $update->rowCount() . " records UPDATED successfully";
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }
    public static function setPagePropertiesWithoutImage($facebook,
   $instagram, $email, $siteName, $siteColor, $siteSlogan, $address, $twitter, $facebookBox, $instagramBox, $twitterBox, $phone, $phoneBox,$siteInfo, $accentColor): void
    {
        $where = "where id = 1 or id =2 or id =3 or id =4 or id =5 or id =7 or id =8 or id =10 or id=11 or id=12 or id=13";
        //alternate query in case the image was not updated
        $db = DBConnect::setConnection();
        try {
            $update = $db->prepare("update site_properties set value = CASE" .
                " WHEN id=1 THEN '" . $facebook .
                "' WHEN id=2 THEN '" . $instagram .
                "' WHEN id=3 THEN '" . $email .
                "' WHEN id=4 THEN '" . $siteName .
                "' WHEN id=5 THEN '" . $siteColor .
                "' WHEN id=7 THEN '" . $siteSlogan .
                "' WHEN id=8 THEN '" . $address .
                "' WHEN id=10 THEN '" . $twitter .
                "' WHEN id=11 THEN '" . $phone .
                "' WHEN id=12 THEN '" . $siteInfo .
                "' WHEN id=12 THEN '" . $siteInfo .
                "' WHEN id=13 THEN '" . $accentColor .
                "' END ".$where);
//            print_r($update);exit();
            $update->execute();
            echo $update->rowCount() . " records UPDATED successfully";
            $update = $db->prepare("update site_properties set visibility = CASE" .
                " WHEN id=1 THEN " . $facebookBox .
                " WHEN id=2 THEN " . $instagramBox .
                " WHEN id=3 THEN 1".
                " WHEN id=4 THEN 1".
                " WHEN id=5 THEN 1".
                " WHEN id=6 THEN 1".
                " WHEN id=7 THEN 1".
                " WHEN id=8 THEN 1".
                " WHEN id=10 THEN " . $twitterBox .
                " WHEN id=11 THEN " . $phoneBox .
                " WHEN id=12 THEN 1" .
                " WHEN id=13 THEN 1" .
                " END ".$where);
            $update->execute();
            echo $update->rowCount() . " records UPDATED successfully";
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }


}