<?php
//call important files that almost every page needs
require_once("DBConnect.php");

require_once("dataValidation.php");
//create
require_once("insertDataToDB.php");
//read
require_once("getDataFromDB.php");
//update
require_once("updateDataFromDB.php");
//delete
require_once("deleteDataFromDB.php");

require_once("session.php");
require("dependencies/css.php");
require("dependencies/js.php");

//start the session
ob_start();
session_start();

?>