<?php	
define("khyraine",true);
error_reporting(0);
header("X-Powered-By: ASP.NET");

	session_start();
	require('lib/config.php');
	global $jlib;
	$jlib->notlogin();
?>
	<?php require("header.php");?>
	
	<?php 	require("menu.php");?>
	<div class="content">

	</div>
	<?php require("footer.php");?>