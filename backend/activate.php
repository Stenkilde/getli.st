<?php
//Activate Account
if(isset($_GET['activate']) === true && $_GET['activate'] == 'yes') {

	echo 'Thank you, your account has now been activated. Go ahead and login!';

} else if (isset($_GET['email'], $_GET['email_code']) === true) {

	$email 		= trim($_GET['email']);
	$email_code	= trim($_GET['email_code']);

		if($users->email_exists($email) === false) {
			$errors[] = 'Sorry, we couldn\'t find that email address';
		} else if ($users->activate($email, $email_code) === false) {
			$errors[] = 'Sorry, we couldn\'t activate your account';
		}

		if(empty($errors) === false) {
			echo '<p>' . implode('</p><p>', $errors) . '</p>';
		} else {
			header('Location: index.php?activate=yes');
			exit();
		}
}

?>