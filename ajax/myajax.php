<?php 
include("../config/init.php");
//Register User
if (isset($_POST['action']) AND $_POST['action']=="reg_user") {
	$fullname = $_POST['fullname'];
	$useremail = $_POST['reg_email'];
	$userpwd = $_POST['reg_pwd'];
	$confpwd = $_POST['pwd_confirm'];
	//validation
	if (empty($fullname) or empty($useremail) or empty($userpwd) or empty($confpwd)) {
		echo "Please fill required fields";
		exit;
	}
	if (!filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
  		echo "Please type a valid email address";
  		exit;
	}
	if ($userpwd!==$confpwd) {
		echo "Passwords does not matched";
		exit;
	}
	$result = $user->register_user($fullname,$useremail,$userpwd);
	echo $result ? 1 : 0;
	exit;
}



//Login User
if (isset($_POST['action']) AND $_POST['action']=="login_user") {
	$email = $_POST['email'];
	$password = $_POST['password'];
	//validation
	if (empty($email) or empty($password)) {
		echo "Please fill required fields";
		exit;
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  		echo "Please type a valid email address";
  		exit;
	}
	
	$result = $user->login_user($email,$password);
	echo $result;
	exit;
}



//Logout User
if (isset($_POST['action']) AND $_POST['action']=="logout_user") {
	$result = $user->logout_user();
	echo $result;
	exit;
}



//Insert Chat
if (isset($_POST['action']) AND $_POST['action']=="insertchat") {
	$senderid = $_SESSION['userid'];
	$receiverid = $_POST['receiverid'];
	$msg = $_POST['msg'];
	$result = $chat->insert_chat($senderid,$receiverid,$msg);
	echo $result;
	exit;
}


//Show Chats
if (isset($_POST['action']) AND $_POST['action']=="showchats") {
	$logged_in_user = $_SESSION['userid'];
	$userid = $_POST['userid'];
	$stmt = $database->con->prepare("SELECT * FROM chats WHERE (senderid=$logged_in_user OR receiverid=$logged_in_user) AND (senderid=$userid OR receiverid=$userid)");
	$stmt->execute();

	$stmt2 = $database->con->prepare("UPDATE chats SET status=1 WHERE receiverid=$logged_in_user AND senderid=$userid");
	$stmt2->execute();

	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$json = json_encode($results);
	echo $json;
	// echo "Hello";

}



 ?>