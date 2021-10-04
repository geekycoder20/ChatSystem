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



 ?>