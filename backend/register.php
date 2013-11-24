<?php
// If form is submitted
if(isset($_POST['submit'])) {

	if(empty($_POST['email']) || empty($_POST['password'])) {

		$errors[] = 'You need to fill out all the fields.';

	} else {

		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            $errors[] = 'Please enter a valid email address';
        } else if ($users->email_exists($_POST['email']) === true) {
            $errors[] = 'That email already exists.';
        }
		if(strlen($_POST['password']) <6) {
			$errors[] = 'Your password need to be atleast 6 characters';
		} else if(strlen($_POST['password']) >68) {
			$errors[] = 'Your password cannot be longer than 68 characters';
		}
	}

	if(empty($errors) === true) {

		$email 		= htmlentities($_POST['email']);
		$password 	= $_POST['password'];

		$users->register($email, $password);
		header('Location: index.php?register=success');
		exit();
	}
}

if(isset($_GET['register']) && $_GET['register'] == 'success') {
	echo 'Thank you for registering. Please check your email.';
}

?>

<form class="create-profile activated">
	<input type="text" id="useremail" placeholder="Email">
	<input type="password" id="userpassword" placeholder="Password">

	<?php
		if(empty($errors) === false) {
			echo '<div><p>' . implode('</p><p>', $errors) . '</p></div>';
		}
	?>

</form>
