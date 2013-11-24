<?php

//Start User sessions
session_start();
require '/connect/config.php';
require 'classes/Users.php';
require 'classes/General.php';

$users 		= new Users($db);
$general 	= new General();

$errors		= array();

?>