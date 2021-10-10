<?php 
include("../config/init.php");
$project_dir = "/chat_system/";
$project_path = $_SERVER['DOCUMENT_ROOT'].$project_dir;
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

	$mystmt = $database->con->prepare("SELECT * FROM users WHERE id=$userid");
	$mystmt->execute();

	$stmt2 = $database->con->prepare("UPDATE chats SET status=1 WHERE receiverid=$logged_in_user AND senderid=$userid");
	$stmt2->execute();

	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$results2 = $mystmt->fetchAll(PDO::FETCH_ASSOC);
	$json = json_encode([$results,$results2]);
	echo $json;
	// echo "Hello";
}



//Update Profile
if (isset($_POST['action']) AND $_POST['action']=="update_profile") {
	$pwd = $_POST['pwd'];
	$newpwd = $_POST['newpwd'];
	$conpwd = $_POST['connewpwd'];

	$filename = $_FILES['profile_pic']['name'];
	$filetmp = $_FILES['profile_pic']['tmp_name'];
	$filetype = $_FILES['profile_pic']['type'];
	$file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	$img_size = !empty($filename) ? getimagesize($filetmp) : null;
	$allowed_extens = array('gif', 'png', 'jpg');
	$newfilename = !empty($filename) ? time().".".$file_ext : null;

	//validations
	if (empty($pwd) or empty($newpwd) or empty($conpwd)) {
		echo "Please fill required fields";
		exit;
	}
	$userid = $_SESSION['userid'];
	$stmt = $database->con->prepare("SELECT * FROM users WHERE id=:userid");
	$stmt->execute([':userid'=>$userid]);
	$myuser = $stmt->fetch();
	if ($myuser['password']!==$pwd) {
		echo "Current Password is wrong";
		exit;
	}
	if ($newpwd!==$conpwd) {
		echo "Passwords Did not matched";
		exit;
	}
	if (!empty($filename) AND !in_array($file_ext, $allowed_extens)) {
		echo "Only jpg,png and gif files are allowed";
		exit;
	}
	if (!empty($filename) AND !is_array($img_size)) {
		echo "File must be an image";
		exit;
	}
	move_uploaded_file($filetmp, $project_path."images/".$newfilename);
	
	$result = $user->update_profile($newpwd,$newfilename);
	echo $result ? 1 : 0;
	exit;
}



 ?>