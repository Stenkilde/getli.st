<?php
// Connection's Parameters
$db_host="mysql9.gigahost.dk";
$db_name="gamersnation_getlist";
$db_username="gamersnation";
$db_password="707c5kxl";
$db_con=mysql_connect($db_host,$db_username,$db_password);
$connection_string=mysql_select_db($db_name);
// Connection
mysql_connect($db_host,$db_username,$db_password);
mysql_select_db($db_name);
?>