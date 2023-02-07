<?php

class getDataFromDB
//every single database job should be stored here and called via the class as a static function
{
    //offset used by pagination, if nothing is set, start from first post
    public static function getArticles($offset=0)
    {
        try {

            //get every article in the db
            $db = DBConnect::setConnection();
            $select = $db->prepare('SELECT * FROM articles '.
            'ORDER BY created_time DESC '.
            'LIMIT 3 OFFSET :offset');
            $select->bindParam('offset', $offset, PDO::PARAM_INT);

            $select->execute();
            return $select->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }

    public static function getCategoryArticles($category, $offset = 0)
    {
        try {
            //get every article in the db
            $db = DBConnect::setConnection();
            $select = $db->prepare('SELECT a.id, a.title, a.body, '.
                    'a.created_time, a.header_image, c.category_name  from articles a '.
                'inner join categories c on c.id =a.category_id  '.
                'where c.category_name = :category_name '.
                'order by a.created_time '.
            'LIMIT 3 OFFSET :offset');
//            print_r($select);exit;
            $select->bindParam('category_name', $category, PDO::PARAM_STR);

            $select->bindParam('offset', $offset, PDO::PARAM_INT);
            $select->execute();
            return $select->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "an error occurred, contact website administrator";
        }
    }

    public static function getPromotedArticles()
    {
        try {
            //get only the 5 most recent promoted articles
            $db = DBConnect::setConnection();
            $select = $db->prepare('select id, title, header_image from articles a '.
                'where promoted = 1 '.
                'order by created_time DESC '.
                'limit 5');
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
            //get a single article in order to edit it
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
            //get a single category for viewing and editing purposes
            $db = DBConnect::setConnection();
            $select = $db->prepare('SELECT * FROM categories cat ' .
                'where id =' . $id);
            $select->execute();
            return $select->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }
    //if not id is passed, give it a value of 1
    public static function getCategoryVisibility($id=1)
    {
        try {
            //get a single article
            $db = DBConnect::setConnection();
            $select = $db->prepare('SELECT cp2.visibility, cp2.visibility_name  FROM '
                . '(SELECT * FROM categories where id = ' . $id . ') AS cat '
                . 'RIGHT join category_properties cp2 on cp2.visibility = cat.visibility '
                . 'order by id desc');
            $select->execute();

            return $select->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }
//decalre a default value
    public static function getSelectedArticleCategory($id= 1)
    {
        try {
            //get the selected category of a single article and the other categories
            $db = DBConnect::setConnection();
            $select = $db->prepare('SELECT c.id, c.category_name  FROM ' .
                '(select * from articles where id =' . $id . ') as a ' .
                'RIGHT JOIN categories c on c.id =a.category_id ' .
                'order by a.id desc');
            $select->execute();

            return $select->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }

    public static function getMenuCategories()
    {
        try {
            $db = DBConnect::setConnection();
            $select = $db->prepare('SELECT category_name FROM categories where visibility >0'
                . ' ORDER BY ORDERING;');
            $select->execute();
            return $select->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }
    public static function getSiteProperties(){
        try {
            $db = DBConnect::setConnection();
            $select = $db->prepare('SELECT * FROM site_properties'
                . ' ORDER BY id;');
            $select->execute();
            return $select->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }

    public static function getVisibleSiteDetails(){
        try {
            $db = DBConnect::setConnection();
            $select = $db->prepare("select value, `key` from site_properties sp".
                " where visibility >0 ".
                " order by id ASC");
            $select->execute();
            return $select->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }


}