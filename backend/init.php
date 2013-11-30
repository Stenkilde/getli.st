<?php

//Start User sessions
session_start();

//Require Connection
require 'connect/config.php';

//Require Classes
require 'classes/Users.php';
require 'classes/General.php';

$users 		= new Users($db);
$general 	= new General();

$errors		= array();

//Require Backend System
require 'register.php';
require 'login.php';

//Logged in or logged out redirect check
$general->logged_in_protect();
$general->logged_out_protect();

?>