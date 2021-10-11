<?php 
ob_start();
session_start();
date_default_timezone_set("Asia/Karachi");
$project_dir = "/chat_system/";
$path = $_SERVER['DOCUMENT_ROOT'].$project_dir;
include("db.php");
include($path."./classes/user.php");
include($path."./classes/chat.php");


 ?>