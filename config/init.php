<?php 
ob_start();
session_start();
$project_dir = "/chat_system/";
$path = $_SERVER['DOCUMENT_ROOT'].$project_dir;
include("db.php");
include($path."./classes/user.php");
include($path."./classes/chat.php");


 ?>