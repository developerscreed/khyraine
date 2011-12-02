<?php
	class olib extends dbconfig{
		var $user;
		var $pass;
		var $db;
		var $host;
		var $con;
			
			function olib(){
				parent::dbconfig();
			}

			function mesage(){
				echo 'connected together';
			}
			
			function jpost($str=''){
				return (isset($_POST[$str])) ? $_POST[$str] : '';
			}
			
			function cleardata($data){
				return stripslashes($data);
			}
			
			function login_access_pass(){
				if($_SESSION['user'] !==""){
					$this->redirect('/core.php');
				}
			}
			
			function notlogin(){
				if($_SESSION['user'] ==""){
					$this->redirect('index.php');
				}
			}

			function setSession($id){
				return $_SESSION[$id];
			}
			
			function secure($str){
				return mysql_escape_string($str);	
			}
			
			function _connect(){
				$this->con = mysql_connect($this->host,$this->user,$this->pass)or die(mysql_error());
				mysql_select_db($this->db,$this->con)or die(mysql_error());
			}
			
			function nohtml($str){
				return strip_tags($str);
			}
	
			function redirect($url){
				if(!headers_sent()){
					header("location:$url");	
				}else{
					echo "<script type='text/javascript'>window.location.href='".addslashes($url)."';</script>";
				}
			}	
			
	}