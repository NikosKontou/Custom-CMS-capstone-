<?php
 class getDataFromDB
{

    public function getArticles()
    {
        $sql = 'SELECT * FROM articles ';
        if (!empty($conn)) {
            $res = $conn->query($sql);
        }
        return $res;
    }
}