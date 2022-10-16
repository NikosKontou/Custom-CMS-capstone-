<?php
class updateDataDromDb
//every update database job should be stored here and called via the class as a static function
{

    public static function setSingleArticle($id, $title, $body)
    {   try{
        //set an article
        $db= DBConnect::setConnection();
        $update = $db->prepare('update articles set title = "'. $title.'",body= "'.$body.'"  where id = '.$id);
//        var_dump($update);exit();
        $update->execute();

        // echo a message to say the UPDATE succeeded
        echo $update->rowCount() . " records UPDATED successfully";
    } catch(PDOException $e) {
        echo "<br>" . $e->getMessage();
}
    }

}