<?php 
class Chat extends Database{
	public function insert_chat($sender,$receiver,$msg){
		$stmt = $this->con->prepare("INSERT INTO chats (senderid,receiverid,msg) VALUES (:sender,:receiver,:msg)");
		$stmt->execute([':sender'=>$sender,':receiver'=>$receiver,':msg'=>$msg]);
		return $stmt;
	}


	public function show_chats($user_id){
		$logged_in_user = $_SESSION['userid'];
		$userid = $user_id;
		$stmt = $this->con->prepare("SELECT * FROM chats WHERE (senderid=:logged_in_user OR receiverid=:logged_in_user) AND (senderid=:userid OR receiverid=:userid)");
		$stmt->execute([':logged_in_user'=>$logged_in_user,':userid'=>$userid]);

		$mystmt = $this->con->prepare("SELECT * FROM users WHERE id=:userid");
		$mystmt->execute([':userid'=>$userid]);

		$stmt2 = $this->con->prepare("UPDATE chats SET status=1 WHERE receiverid=:logged_in_user AND senderid=:userid");
		$stmt2->execute([':logged_in_user'=>$logged_in_user,':userid'=>$userid]);
		
		return array($stmt,$mystmt);
	}

	public function update_chat_login_details(){
		$currentdate = date('Y-m-d H:i:s');
		$userid = $_SESSION['userid'];
		$stmt = $this->con->prepare("UPDATE chat_login_details SET lastactivity=:currentdate WHERE userid=:userid");
		$stmt->execute([':currentdate'=>$currentdate,':userid'=>$userid]);
		return $stmt;
	}


	public function get_chat_login_details(){
		$stmt = $this->con->prepare("SELECT * FROM chat_login_details");
		$stmt->execute();
		return $stmt;
	}

	



}


$chat = new Chat();

 ?>