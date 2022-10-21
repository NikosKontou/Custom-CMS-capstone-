<?php
 class getDataFromDB
//every single database job should be stored here and called via the class as a static function
{

    public static function getArticles()
    {
        try {


            //get every article in the db
            $db = DBConnect::setConnection();
            $select = $db->prepare('SELECT * FROM articles');
            $select->execute();
            return $select->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            echo "<br>" . $e->getMessage();
        }
    }    public static function getArticlesForEdit()
    {
        try {

            //get every article in the db to display it at the administrative panel
            $db = DBConnect::setConnection();
            $select = $db->prepare('SELECT a.id, title, category_id, u.user_name , created_time, last_edit '.
                'From articles a '.
                'inner join users u ON u.id = a.created_by '.
                'order by created_time DESC');
            $select->execute();
            return $select->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            echo "<br>" . $e->getMessage();
        }
    }

     public static function getSingleArticle($id)
     {
         try{
         //get a single article
         $db= DBConnect::setConnection();
         $select = $db->prepare('SELECT * FROM articles where id ='.$id);
         $select->execute();
         return $select->fetchAll(PDO::FETCH_OBJ);
         } catch (PDOException $e){
             echo "<br>" . $e->getMessage();
         }
     }

     public static function userLogIn($username){
        try{
         $db= DBConnect::setConnection();
         $select = $db->prepare('SELECT id, user_password FROM users where user_name = :username');
         $select->bindParam('username', $username, PDO::PARAM_STR);
         $select->execute();
         return $select->fetchAll(PDO::FETCH_OBJ);
     } catch (PDOException $e){
echo "<br>" . $e->getMessage();
}

     }

}