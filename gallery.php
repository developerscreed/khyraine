<?php
	echo "create photogallery";
	
	
	$takedirectory = "img/";
	echo is_dir($takedirectory);
	if(is_dir($takedirectory) == 1){
	
		echo "we have directory";
		echo "now we open the directory";
		$thedirectory =  opendir($takedirectory);
		
		echo $thedirectory;
		echo "tesT".readdir($thedirectory);
	}