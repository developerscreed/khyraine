<?php
	session_start();
	require('../lib/config.php');
	require('../lib/users.class.php');
	require('../lib/advancesearch.class.php');
	$usersclass = new users;
	$advSearch = new useradvancesearch;
	
	global $jlib;
		
	$core = $jlib->jpost('core');
	
	switch($core){
		case "registration":
			$count = $usersclass->register();
			echo "Success";
		break;
		case "submit a date":
			
		break;
		case "listuser":
			
		break;
		case "postwall":
			$hold_security_id = $jlib->setSession('user_id');
			$usersclass->post_on_wall($hold_security_id,$jlib->jpost('pro_wall'));
		break;
		case "deletewall":
			$id_del = $jlib->jpost('pro_wall_delete');
			$hold_security_id = $jlib->setSession('user_id');
			if($hold_security_id !==""){
				$cleanid = explode("delete",$id_del);
				return $usersclass->profilewallpost_delete($cleanid[1]);
			}else{
				return false;
			}
		break;
		case "addtolist":
			$idofuser = $jlib->setSession('user_id');
			if($idofuser !==""){			
				$her_or_his_id 	= $jlib->jpost('her_or_his_id');
				$usersclass->addfriends($idofuser,$her_or_his_id);
				$data['success'] = "You have added here to your list";
			}
		break;
		case "deletetolist":
			$idofuser = $jlib->setSession('user_id');
			if($idofuser !==""){
				$her_or_his_id 	= $jlib->jpost('her_or_his_id');
				$usersclass->deletefriends($idofuser,$her_or_his_id);
				echo "You have delete here to your list";
			}
		break;
		case "showfriendsemail":
			echo "hello";
		break;
		case "angrywall":
		print_r($_SESSION['user_id']);
		/*	if($jlib->setSession('user_id') !==""){
			$takeid = $usersclass->users_firewall_stoper($jlib->setSession('user_id'));
			echo 'test'.$takeid;
			}
		*/
			#users_angrywall_post
		break;
		case "advancesearch":
			if($jlib->jpost('gender') !==""){
				$advSearch->advancesearch_results($jlib->jpost('gender'));
			}else{
				echo "<span class='red'>required Gender Fields</span>";
			}
		break;
		default:
			echo "<h1>Page not found</h1>";
		break;
	}
	