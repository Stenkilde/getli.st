<?php
//Log user in
if(empty($_POST) === false) {

	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	if(empty($username) === true || empty($password) === true) {
		$errors[] = 'Sorry, but we need your username and password':
	} else if ($users->user_exists($username) === false) {
		$errors[] = 'Sorry, that username doesn\'t exist';
	} else if ($users->email_confirmed($username) === false) {
		$erorrs[] = 'Sorry, but you need to activate your account.
					 Please check your email.';
	} else {

		$login = $users->login($username, $password);
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

<form class="login-user">
	<input type="text" id="userEmail" class="login" placeholder="Email">
	<input type="password" id="userPassword" class="login" placeholder="Password">
	<input method="post" class="btn btn-login" value="Log me in!">
	<a href="#" id="accountNone">I changed my mind! I need a profile!</a>
</form>