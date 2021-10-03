<?php 
class Database{
	public $con;
	public $username;
	public $password;
	public $db;

	public function __construct(){
		$this->db_connect();
	}

	public function db_connect(){
		$this->username = "root";
		$this->password = "";
		$this->db = "chat_system";
		try{
			$this->con = new PDO("mysql:host=localhost;dbname=$this->db",$this->username,$this->password);
		}
		catch(PDOException $e){
			echo "Connection Failed: ".$e->getMessage();
		}
	}
}


$database = new Database();


 ?>