<?php
//call important files that almost every page needs
require_once("DBConnect.php");
require_once("session.php");
//create

//read
require_once("getDataFromDB.php");
//update
require_once("updateDataFromDB.php");
//delete
require_once("deleteDataFromDB.php");

require("dependencies/css.php");
require("dependencies/js.php");

//start the session
ob_start();
session_start();
?>