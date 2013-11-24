<?php
class Users {

	private $db;

	public function __contruct($database) {
		$this->db = $database;
	}

	// Check if email exit in DB
	public function email_exists($email) {

		$query = $this->db->prepare("SELECT COUNT(`uID`) FROM `users` WHERE `email`=?");
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
		$activationHash	= sha1($email = microtime());
		$password		= sha1($password);

		$query = $this->db->prepare("INSERT INTO `users` (`email`, `password`, `activationHash`, `timestamp`) VALUES (?, ?, ?, ?) ");

		$query->bindValue(1, $email);
		$query->bindValue(2, $password);
		$query->bindValue(3, $activationHash);
		$query->bindValue(4, $time);

		try {
			$query->execute();

			// mail($email, 'Please activate your account', "Hello " . $username. ",\r\nThank you for registering with us. Please visit the link below so we can activate your account:\r\n\r\nhttp://getli.st/activate.php?email=" . $email . "&email_code=" . $email_code . "\r\n\r\n-- The Getli.st Team");
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
	public function login($username, $password) {

		$query = $this->db->prepare("SELECT `password`, `uID` FROM `users` WHERE `username` = ?");
		$query->bindValue(1, $username);

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
	public function email_confirmed($username) {

		$query = $this->db->prepare("SELECT COUNT(`uID`) FROM `users` WHERE `username` = ? AND `activated` = ?");
		$query->bindValue(1, $username);
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

}
?>