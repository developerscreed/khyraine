<?php
	session_start();
	require_once("../../lib/config.php");
	require_once("../../lib/users.class.php");	
	global $jlib;
	$usersclass = new users;
			
			$idofuser = $jlib->setSession('user_id');
			$friends_ids = "";
			if($idofuser !==""){
				echo "<h4>My friends list</h4>";
				$viewlistings = $usersclass->view_users_undermyaccount($idofuser);
				if($viewlistings > 0){
					foreach($viewlistings as $morefriends):
						if($morefriends !==""){
							$friends_ids[] = $morefriends['friendsroot_id'];
						}else{
							echo "Seems that  you don't have friends";
						}
					endforeach;
				}
			
				if($friends_ids !==""){
					$friends_source_ids = implode(",",$friends_ids); 
						if($friends_source_ids !==""){
							$showlistof_users = $usersclass->view_users_friends_list($friends_source_ids);
							if($showlistof_users > 0){
								foreach($showlistof_users as $showviewers):
									echo "<div class='stats_emailfriends left'>";
									echo "<a href='javascript:void(0);' class='addme_email' statsEmail='".$showviewers['reg_email']."'>";
									echo "<img src='img/bc.jpeg' style='height: 50px;'>".$showviewers['reg_user']."</a><br />";
									echo "</div>";
								endforeach;
							}else{
								return false;
							}
						}
				}
			}
			