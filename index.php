<?php
//Requires header.php to function
require 'header.php';

//Check if logged in
//$general->logged_in_protect();
?>
	<div class="app">
		<div class="popup-container">
			<div class="popup">
				<span class="ui-btn-close icon-close"></span>
				<h4 class="popup-heading">Type in your email and sign up for the beta!</h4>
				<input type="text" placeholder="Type email here">
				<input type="submit"class="btn btn-login" value="Enroll today!">
			</div>
		</div>

		<div class="container main-block">
			<header class="header centered">
				<img class="logo" src="img/getlistlogo.svg">
			</header>
				<section class="row main">
					<div class="column large-12 login-module">
						<form class="create-profile is-visible" method='post' action="index.php">
							<input type="text" name="email" id="userEmail" class="login" placeholder="Email">
							<input type="password" name="password" id="userPassword" class="login" placeholder="Password">
							<input type="submit" name="register" class="btn btn-succes" value="Create my Account!">
							<a href="#" id="accountExists">I already have an account</a>

							<?php if(empty($errors) === false) {
									echo '<div class="register-error"><p>' . implode('</p><p>', $errors) . '</p></div>';
							} ?>
						</form>
						<form class="login-user" method="post" action="index.php">
							<input type="text" name="email" id="userEmail" class="login" placeholder="Email">
							<input type="password" name="password" id="userPassword" class="login" placeholder="Password">
							<input type="submit" name="login" class="btn btn-login" value="Log me in!">
							<a href="#" id="accountNone">I changed my mind! I need a profile!</a>

							<?php if(empty($errors) === false) {
								echo '<div><p>' . implode('</p><p>', $errors) . '</p></div>';
							} ?>
						</form>
					</div>
				</section>
			<!--What does the fox say?-->
		</div>
	</div>
<?php
//Requires footer.php to function
require('footer.php');
?>