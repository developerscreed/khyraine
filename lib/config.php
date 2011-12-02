<?php
	require_once('db.class.php');
	require_once('lib.class.php');
	
	
	$jlib	= new olib;
	//$jdb	= new dbconfig;
	
	global $jlib;
	//global $jdb;
	
	$jlib->host = 'localhost';
	$jlib->user = 'root';
	$jlib->pass = '';
	$jlib->db	= 'date2';
	$jlib->_connect();
	