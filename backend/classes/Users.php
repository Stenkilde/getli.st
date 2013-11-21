<?php
class Users {

	private $db<php

	public function __contruct($database) {
		$this->db = $database;
	}

	// Check if email exit in DB
	public function email_exists($email) {

		$query = $this->db->prepare("SELECT COUNT(`id`) FROM `users` WHERE `email`=?");
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

			//Mail Message Here
		} catch(PODException $e) {
			die($e->getMessage());
		}



	}


}
?>