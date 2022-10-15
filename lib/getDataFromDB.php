<?php
 class getDataFromDB
//every single database job should be stored here and called via the class as a static function
{

    public static function getArticles()
    {
        //get every article in the db
        $db= DBConnect::setConnection();
        $select = $db->prepare('SELECT * FROM articles');
        $select->execute();
        return $select->fetchAll(PDO::FETCH_ASSOC);
    }

     public static function getSingleArticle($id)
     {
         //get a single article
         $db= DBConnect::setConnection();
         $select = $db->prepare('SELECT * FROM articles where id ='.$id);
         $select->execute();
         return $select->fetchAll(PDO::FETCH_OBJ);
     }

}