<?php
class General {
	
	//Check if user is logged in
	public function logged_in() {
		return(isset($_SESSION['id'])) ? true : false;
	}

	//If logged in redirect to home.php
	public function logged_in_protect() {
		if($this->logged_in() === true) {
			if($_SERVER['PHP_SELF'] == "/index.php") {
				header('Location: home.php');
				exit();
			}
		}
	}
	
	//If not logged in then redirect to index.php
	public function logged_out_protect(){
		if($this->logged_in() === false) {
			if($_SERVER['PHP_SELF'] != "/index.php") {
				header('Location: index.php');
				exit();
			}
		}
	}
	
}
?>