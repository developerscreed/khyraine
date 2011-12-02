<?php
	session_start();
	require('lib/config.php');
	
	global $jlib;
	session_unset();
	session_destroy();
	$jlib->redirect('index.php');
	
?>