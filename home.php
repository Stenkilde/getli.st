<?php
//Requires header.php to function
require 'header.php';

//Check if logged in
$general->logged_out_protect();
?>


<h1>Hello <?php echo $username, '!'; ?></h1>



<?php
//Requires footer.php to function
require 'footer.php';
?>