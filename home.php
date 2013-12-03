<?php
//Requires header.php to function
require 'header.php';

//Define login info
$user 		= $users->userdata($_SESSION['id']);
$email 		= $user['email'];
?>


<h1>Goodmorning<!-- (Skal skifte alt efter hvad tid på dagen det er) --> <?php echo $email . '!'; ?></h1>
<a href="logout.php">Logout</a>

<section class="row">
	<div class="listShower column large-12">
		<ul class="activeLists">
			<li><a href="#">Morgenamds indkøb</a></li>
			<li><a href="#">Indkøb til Fest</a></li>
			<li><a href="#">Liste Nummer 3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
		</ul>
	</div>
</section>

<?php
//Requires footer.php to function
require 'footer.php';
?>