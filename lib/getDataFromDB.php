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
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }

    public static function getArticlesForEdit()
    {
        try {

            //get every article in the db to display it at the administrative panel
            $db = DBConnect::setConnection();
            $select = $db->prepare('SELECT a.id, title, category_id, u.user_name , created_time, IF(last_edit="0000-00-00 00:00:00","-", last_edit) as last_edit ' .
                'From articles a ' .
                'inner join users u ON u.id = a.created_by ' .
                'order by created_time DESC');
            $select->execute();
            return $select->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }

    public static function getSingleArticle($id)
    {
        try {
            //get a single article
            $db = DBConnect::setConnection();
            $select = $db->prepare('SELECT * FROM articles where id =' . $id);
            $select->execute();
            return $select->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }

    public static function userLogIn($username)
    {
        try {
            $db = DBConnect::setConnection();
            $select = $db->prepare('SELECT id, user_password, access_level FROM users where user_name = :username');
            $select->bindParam('username', $username, PDO::PARAM_STR);
            $select->execute();
            return $select->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }

    }

    public static function getCategories()
    {
        try {

            //get every article in the db to display it at the administrative panel
            $db = DBConnect::setConnection();
            $select = $db->prepare('SELECT * FROM categories');
            $select->execute();
            return $select->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }

    public static function getSingleCategory($id)
    {
        try {
            //get a single article
            $db = DBConnect::setConnection();
            $select = $db->prepare('SELECT * FROM categories cat'.
            'where id =' . $id);
            $select->execute();
            return $select->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }
    public static function getCategoryForEdit($id)
    {
        try {
            //get a single article
            $db = DBConnect::setConnection();
            $select = $db->prepare('SELECT cat.id, cat.category_name, cat.ordering, cp2.visibility, cp2.visibility_name  FROM'
            .'(SELECT * FROM categories where id = '.$id.') AS cat'
            .'RIGHT join category_properties cp2 on cp2.visibility = cat.visibility'
            .'order by id desc');
            $select->execute();
            return $select->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }

    public static function getMenuCategories()
    {
        try {

            //get every article in the db to display it at the administrative panel
            $db = DBConnect::setConnection();
            $select = $db->prepare('SELECT category_name FROM categories where visibility >0'
            .' ORDER BY ORDERING;');
            $select->execute();
            return $select->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }


}