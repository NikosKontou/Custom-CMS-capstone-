<?php
if(!isset($_SESSION['id']))
{
    header('location:index.php?lmsg=true');
    exit;
}
?>