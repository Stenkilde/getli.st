<?php
//Include backend/init.php
require 'backend/init.php';

if($_GET['register']) {
	require 'backend/register.php';
} else if ($_GET['activate']) {
	require 'backend/activate.php';
} else if ($_GET['login']) {
	require 'backend/login.php';
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Index 1</title>
	<meta name="author" content="" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="viewport" content="initial-scale=1">
	<meta http-equiv="x-dns-prefetch-control" content="on" />
	<link rel="dns-prefetch" href="//ajax.googleapis.com" />
	<link rel="stylesheet" href="css/styles.css" />
</head>
<!--[if lt IE 8]><body class="ie ie7"><![endif]-->
<!--[if IE 8]><body class="ie ie8"><![endif]-->
<!--[if IE 9]><body class="ie ie9"><![endif]-->
<!--[if !IE]><!--><body><!--<![endif]-->