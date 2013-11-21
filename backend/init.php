<?php

//Start User sessions
session_start();
require 'config.php';
require 'classes/Users.php';
require 'classes/General.php';

$users 		= new Users($db);
$general 	= new General();

$errors		array();

?>