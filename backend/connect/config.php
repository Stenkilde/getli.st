<?php 
$config = array(
	'host'		=> 'mysql9.gigahost.dk',
	'username'	=> 'gamersnation',
	'password'	=> '707c5kxl',
	'dbname' 	=> 'gamersnation_getlist'
);

//$config = array(
//	'host'		=> 'localhost',
//	'username'	=> 'root',
//	'password'	=> '',
//	'dbname' 	=> 'getlist'
//);
$db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'], $config['username'], $config['password']);
 
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>