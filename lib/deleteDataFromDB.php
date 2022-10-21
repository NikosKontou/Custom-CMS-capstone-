<?php

class deleteDataFromDB
//every single database job should be stored here and called via the class as a static function
{

    public static function deleteArticle($id)
    {
        try {
            //get every article in the db
            $db = DBConnect::setConnection();
            $delete = $db->prepare('DELETE FROM articles where id=:id');

            $delete->bindParam('id', $id, PDO::PARAM_INT);
            $delete->execute();
            return $delete->rowCount();
        } catch(PDOException $e) {
            return false;
        return"<br>" . $e->getMessage();
        }
    }


}