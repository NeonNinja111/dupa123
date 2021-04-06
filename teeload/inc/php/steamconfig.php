<?php
	include("config.php");
	
	$steamauth['apikey'] = $config["apikey"];
	$steamauth['domainname'] = $_SERVER['SERVER_NAME'];
	$steamauth['logoutpage'] = $_SERVER['PHP_SELF'];
	$steamauth['loginpage'] = $_SERVER['PHP_SELF'];
?>