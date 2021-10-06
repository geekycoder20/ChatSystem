<?php 
class Chat extends Database{
	public function insert_chat($sender,$receiver,$msg){
		$stmt = $this->con->prepare("INSERT INTO chats (senderid,receiverid,msg) VALUES (:sender,:receiver,:msg)");
		$stmt->execute([':sender'=>$sender,':receiver'=>$receiver,':msg'=>$msg]);
		return $stmt;
	}

	



}


$chat = new Chat();

 ?>