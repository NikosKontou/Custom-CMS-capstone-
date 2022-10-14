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
}