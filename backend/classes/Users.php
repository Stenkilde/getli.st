<?php
class Users {

	private $db;

	public function __construct($database) {
		$this->db = $database;
	}

	// Check if email exit in DB
	public function email_exists($email) {

		$query = $this->db->prepare("SELECT COUNT(`uID`) FROM `users` WHERE `email`= ?");
		$query->bindValue(1, $email);

		try{
			$query->execute();
			$rows = $query->fetchColumn();

			if($rows == 1) {
				return true;
			} else {
				return false;
			}
		} catch (PODException $e) {
			die($e->getMessage());
		}
	}

	//Register User
	public function register($email, $password) {

		$time			= time();
		$ip				= $_SERVER['REMOTE_ADDR'];
		$activationHash	= sha1($email + microtime());
		$password		= sha1($password);

		$query = $this->db->prepare("INSERT INTO `users` (`email`, `password`, `activationHash`, `timestamp`) VALUES (?, ?, ?, ?) ");

		$query->bindValue(1, $email);
		$query->bindValue(2, $password);
		$query->bindValue(3, $activationHash);
		$query->bindValue(4, $time);

		try {
			$query->execute();



			$to 		= $email;
			$subject	= 'Please activate your account';
			$message 	= "Hello,\r\nThank you for registering with us. Please visit the link below so we can activate your account:\r\n\r\nhttp://getli.st/index.php?activate=yes&email=" . $email . "&email_code=" . $activationHash . "\r\n\r\n- The Getli.st Team";
			$headers	= 'From: noreply@getli.st';

			mail($to, $subject, $message, $headers);
		} catch(PODException $e) {
			die($e->getMessage());
		}
	}

	//Activate User
	public function activate($email, $email_code) {

		$query = $this->db->prepare("SELECT COUNT(`uID`) FROM `users` WHERE `email` = ? AND `activationHash` = ? AND `activated` = ?");

		$query->bindValue(1, $email);
		$query->bindValue(2, $email_code);
		$query->bindValue(3, 0);

		try{

			$query->execute();
			$rows = $query->fetchColumn();

			if($rows == 1) {

				$query_2 = $this->db->prepare("UPDATE `users` SET `activated` = ? WHERE `email` = ?");

				$query_2->bindValue(1, 1);
				$query_2->bindValue(2, $email);

				$query_2->execute();
				return true;

			} else {
				return false;
			}

		} catch(PODException $e) {
			die($e->getMessage());
		}
	}

	//Login user
	public function login($email, $password) {

		$query = $this->db->prepare("SELECT `password`, `uID` FROM `users` WHERE `email` = ?");
		$query->bindValue(1, $email);

		try{

			$query->execute();
			$data 				= $query->fetch();
			$stored_password	= $data['password'];
			$id					= $data['uID'];

			//Checking hash encrypt between passwords
			if($stored_password === sha1($password)) {
				return $id;
			} else {
				return false;
			}

		} catch(PODException $e) {
			die($e->getMessage);
		}

	}

	//Check if users account is activated
	public function email_confirmed($email) {

		$query = $this->db->prepare("SELECT COUNT(`uID`) FROM `users` WHERE `email` = ? AND `activated` = ?");
		$query->bindValue(1, $email);
		$query->bindValue(2, 1);

		try {

			$query->execute();
			$rows = $query->fetchColumn();

			if($rows == 1) {
				return true;
			} else {
				return false;
			}

		} catch(PODException $e) {
			die($e->getMessage);
		}

	}

	//Get user data
	public function userdata($id) {

		$query = $this->db->prepare("SELECT * FROM `users` WHERE `uID` = ?");
		$query->bindValue(1, $id);

		try {

			$query->execute();
			return $query->fetch();

		} catch(PODException $e) {

			die($e->getMessage);
		
		}

	}

	//List all users
	public function get_users() {

		$query = $this->db->prepare("SELECT * FROM `users` ORDER BY `timestamp` DESC");

		try {
			$query->execute();
		} catch(PODException $e) {
			die($e->getMessage);
		}

		return $query->fetchAll();
	
	}

}
?>