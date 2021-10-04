<?php 
class User extends Database{
	public function show_all_users(){
		$stmt = $this->con->prepare("SELECT * FROM users");
		$stmt->execute();
		return $stmt;
	}
}


$user = new User();

 ?>