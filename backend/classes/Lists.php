<?php
class Lists {

	private $db;

	public function __construct($database) {
		$this->db = $database;
	}

	public function get_users_lists($id) {
		
		$query = $this->db->prepare("SELECT * FROM `lists` WHERE `ownerID` = ". $id . " OR `uIDs` = " . $id . "");

		try {
			$query->execute();
		} catch(PODException $e) {
			die($e->getMessage);
		}

		return $query->fetchAll();

	}

	
}
?>