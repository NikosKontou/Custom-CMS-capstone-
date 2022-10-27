<?php
if(!isset($_SESSION['id']))
{ if ($_SESSION['accessLevel'] !=2) {
    //to do: add access denied page
    header('location:../index.php?lmsg=true');
    //with exit, we ensure nothing else will run on the server
    exit();
}
}
?>