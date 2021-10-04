<?php 
class User extends Database{
	public function show_all_users(){
		$stmt = $this->con->prepare("SELECT * FROM users");
		$stmt->execute();
		return $stmt;
	}

	public function register_user($name,$email,$password){
		$stmt = $this->con->prepare("INSERT INTO users (name,email,password) VALUES (:name,:email,:password)");
		$stmt->execute([':name'=>$name,':email'=>$email,':password'=>$password]);
		return $stmt;
	}

	public function login_user($email,$password){
		$stmt = $this->con->prepare("SELECT * FROM users WHERE email=:email");
		$stmt->execute([':email'=>$email]);
		if ($stmt->rowCount()>0) {
			$found_user = $stmt->fetch();
			$found_user_pwd = $found_user['password'];
			if ($found_user_pwd===$password) {
				$_SESSION['userid'] = $found_user['id'];
				$_SESSION['username'] = $found_user['name'];
				$_SESSION['useremail'] = $found_user['email'];
				return 1;
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}




}


$user = new User();

 ?>