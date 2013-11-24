<?php
//Requires header.php to function
require 'header.php';

//Check if logged in
$general->logged_out_protect();
$user 		= $users->userdata($_SESSION['id']);
$email 		= $user['email'];
?>


<h1>Hello <?php echo $email . '!'; ?></h1>
<a href="logout.php">Logout</a>



<?php
//Requires footer.php to function
require 'footer.php';
?>