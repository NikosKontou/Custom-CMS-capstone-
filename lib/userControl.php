<?php
if(!isset($_SESSION['id']))
{
    //to do: add access denied page
    header('location:../index.php?lmsg=true');
    exit;
}
?>