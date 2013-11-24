<?php
//Log user in
if(empty($_POST) === false && isset($_POST['login']) === true) {

	$email = trim($_POST['email']);
	$password = trim($_POST['password']);

	if(empty($email) === true || empty($password) === true) {
		$errors[] = 'Sorry, but we need your email and password';
	} else if ($users->email_exists($email) === false) {
		$errors[] = 'Sorry, that email doesn\'t exist';
	} else if ($users->email_confirmed($email) === false) {
		$erorrs[] = 'Sorry, but you need to activate your account.
					 Please check your email.';
	} else {

		$login = $users->login($email, $password);
		if($login === false) {
			$errors[] = 'Sorry, that username/password is invalid';
		} else {
			$_SESSION['id'] = $login;

			header('Location: home.php');
			exit();
		}
	}
}

?>

<form class="login-user" method="post" action="index.php">
	<input type="text" name="email" id="userEmail" class="login" placeholder="Email">
	<input type="password" name="password" id="userPassword" class="login" placeholder="Password">
	<input type="submit" name="login" class="btn btn-login" value="Log me in!">
	<a href="#" id="accountNone">I changed my mind! I need a profile!</a>

	<?php if(empty($errors) === false) {
		echo '<div><p>' . implode('</p><p>', $errors) . '</p></div>';
	} ?>
</form>