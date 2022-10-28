<?php
//in order to allow a user to edit site properties (e.g. articles) it is required to have an id and his/her access level to be 2 (administrator)
if(isset($_SESSION['id'])){
    if ($_SESSION['accessLevel'] !=2) {
    //send the user to the index page if they fail to verify
    header('location:../index.php?lmsg=true');
    //with exit, we ensure nothing else will run on the server
    exit();
}
} else{
    //send the user to the index page if they fail to verify
    header('location:../index.php?lmsg=true');
    exit();
}
?>