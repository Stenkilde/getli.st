<?php
//Requires header.php to function
require 'header.php';

//Define login info
$user 			= $users->userdata($_SESSION['id']);
$email 			= $user['email'];
$userLists		= $lists->get_users_lists($user['uID']);
$userListsCount	= count($userLists);
?>


<h1>Goodmorning<!-- (Skal skifte alt efter hvad tid på dagen det er) --> <?php echo $email . '!'; ?></h1>
<a href="logout.php">Logout</a>

<section class="row">
	<div class="listShower column large-12">
		<ul class="activeLists">
			<?php

			if($userListsCount > 0) {

				foreach($userLists as $userList) {
					echo '<li><a href="#">' . $userList['listName'] . '</a></li>';
				}

			} else {
				echo '<li>You don\'t have any lists right now. <a href="#">Create one now</a></li>';
			}

			?>
		</ul>
	</div>
</section>

<?php
//Requires footer.php to function
require 'footer.php';
?>