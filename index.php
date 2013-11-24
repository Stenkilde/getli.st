<?php
//Requires header.php to function
require 'header.php';
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
						<?php include 'register.php'; ?>
						<form class="login-user">
							<input type="text" id="userEmail" class="login" placeholder="Email">
							<input type="password" id="userPassword" class="login" placeholder="Password">
							<a href="#" class="btn btn-login">Log me in!</a>
							<a href="#" id="accountNone">I changed my mind! I need a profile!</a>
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