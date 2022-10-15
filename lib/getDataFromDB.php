<?php
 class getDataFromDB

{

    public static function getArticles()
    {
        $db= DBConnect::setConnection();
        $select = $db->prepare('SELECT * FROM articles');
        $select->execute();
        return $select->fetchAll(PDO::FETCH_ASSOC);
    }

     public static function getSingleArticle($id)
     {
         $db= DBConnect::setConnection();
         $select = $db->prepare('SELECT * FROM articles where id ='.$id);
         $select->execute();
         return $select->fetchAll(PDO::FETCH_OBJ);
     }

}