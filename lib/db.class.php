<?php
#	Author: Christopher Cuizon
#	Email : christophercuizons@gmail.com
#Dedicated: This website is dedicated to inspire people within me like the way they inspired me
#	Any Copyrights of this website is highly violated 
	class dbconfig{
		var $_fields;
		var $_jrows;
		
		//function __construct(){
		//	parent::olib();	
		//}
		
		function dbconfig(){
		
		}
		
		function message2(){
			echo 'connected db';
		}
		
		function jsql($str){
			$sql = @mysql_query($str)or die(mysql_error());
			$this->_jrows = @mysql_num_rows($sql);
			return $sql;
		}
		
		function jfields($dbfields,$post){
			$this->_fields[] = $dbfields."='".$post."'";
		}
		
		function jSave($tbl){
			$str = "INSERT $tbl SET ".implode(",",$this->_fields);
			$sql = $this->jsql($str);
			
			return $sql;
		}
		
		function jrows(){
			return $this->_jrows;
		}
		
		function jfetch($row){
			$rows = mysql_fetch_array($row);
			return $rows;	
		}
		
		function jfetch_many($str){
			$args = array();
			while($row = mysql_fetch_array($str)){
				$args[] = $row;	
			}	
			return $args;
		}
		
		function jdelete($tbl,$where=""){
			$str = "DELETE from $tbl $where";
			return $this->jsql($str);
		}
		
		function jcount($tbl,$where=""){
			$str = "SELECT count(*) from $tbl $where";
			return $this->jsql($str);
		}
		
		function select($tbl,$where=""){
			$wer = ($where !=="") ? "where ".$where : '';
			$sql ="SELECT * from $tbl ".$wer;
			return $this->jsql($sql);
		}
		
		function jobject($str){
			$rows = mysql_fetch_object($str);
			return $rows;	
		}
		
		function jUpdate($tbl,$id=""){
			$str = "UPDATE $tbl SET ".implode(",",$this->_fields);
			$sql = $this->jsql($str);
			return $sql;
		}
		
	}