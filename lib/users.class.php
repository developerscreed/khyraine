<?php
#	Developer: Christopher Cuizon
#	Webdeveloper / Software Engr.
#	I have created this website inorder to inspire people just like they inspired me
	class users extends olib{
		
		function __construct(){
			parent::olib();
		}
		
		function register(){
			if($this->jpost('reg')){
				$this->jfields('reg_user',$this->jpost('user'));
				$this->jfields('reg_pass',$this->jpost('ps'));
				$this->jfields('reg_email',$this->jpost('email'));
				$args = $this->jSave('date_reg');
			}	
		}
		
		function login_require(){	
			if($this->jpost('securesubmit')){
			
				$_secureuser = $this->secure($this->jpost('securepass'));
				$_securepass = $this->secure($this->jpost('secureuser'));
				
				$sql = "SELECT reg_user,reg_id,reg_pass from date_reg where reg_user='".$_secureuser."' && reg_pass ='".$_securepass."'";
				$ses = $this->jsql($sql);
				if($this->jrows($ses) > 0){
						$ws = $this->jobject($ses);
						$_SESSION['user'] = $_secureuser;
						$_SESSION['pass'] = $_securepass;
						$_SESSION['user_id'] = $ws->reg_id;
						return true;
				}else{
					echo "Invalid User";	
					return false;
				}
			}
		}
		
		function users_verifier($url,$checker,$token){
			return ($url >= $checker) ? $token : false;
		}
		
		function post_on_wall($id,$text){
			$this->jfields('user_id',$id);
			$this->jfields('wall_date',gmdate("Y-m-d H-i-s"));
			$this->jfields('pro_wall',$this->secure($this->nohtml($text)));
			$args = $this->jSave('profile_wall');
		}
		
		function profile_information(){
			$uid = $this->secure($this->setSession('user_id'));
			return ($uid !=="") ? $uid : false;
		}
		
		function get_profile_info($id){
			$str = $this->select('date_reg',"reg_id='".$id."'");
			return ($this->jrows()>0) ? $arsgs = $this->jobject($str) : false;
		}
		
		function profile_wall_shoutout($start=0,$end=4){
			$_firewall = ($this->setSession('user_id') !=="") ? $this->setSession('user_id') : "";	
			if($_firewall !==""){
				$sql = "SELECT pro_id,pro_wall,user_id,wall_date from profile_wall where user_id='".$_firewall."' ORDER BY wall_date DESC LIMIT ".$start.",".$end;
				$rows = $this->jsql($sql);
				return $this->jrows() > 0 ? $this->jfetch_many($rows) : false;
			}else{
				return false;	
			}
		}
		
		function profile_wall_pagination($id){
			$sql = $this->jcount("profile_wall","where user_id='".$id."'");
			return ($this->jrows()>0) ? $this->jfetch($sql) : false;
		}
		
		function profile_user_data($id){
			$str = $this->select('date_reg user INNER JOIN profile_wall pro ON user.reg_id=pro.user_id',"user_id = '".$id."'");
			return ($this->jrows()>0) ?  $this->jobject($str) : false;
		}
		
		function profilewallpost_delete($id){
			$sql = $this->jdelete('profile_wall',"where pro_id=".$id);
			return $sql;
		}
		
		function profile_upload_photos($path){
			$target_path = $path."/";
			echo $_FILES['uploadedfile']['name']."haha";

			$target_path = $target_path.basename($_FILES['uploadedfile']['name']); 

			if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    			echo "The file ". basename( $_FILES['uploadedfile']['name'])." has been uploaded";
			} else{
				echo "There was an error uploading the file, please try again!";
			}
		}
		
		function select_all_customer($str){
			$str = $this->select("date_reg","NOT reg_id=".$str);
			return ($this->jrows() > 0) ? $this->jfetch_many($str): false;
		}
		
		function addfriends($sessions,$her_or_his_id){
			if($sessions !==""){
				$this->jfields('friends_userid',$sessions);
			#	$this->jfields('friends_status',$friendstatus);
				$this->jfields('friendsroot_id',$her_or_his_id);
			#	$this->jfields('friends_rights',$friends_rights);
				$this->jSave('friends');
				return true; 
			}else{
				return false;
			}
		}
		
		function deletefriends($sessions,$her_or_his_id){
			if($sessions !==""):
				$this->jdelete("friends","where friendsroot_id=".$her_or_his_id);
				return true; 
			else:
				return false;
			endif;
		}

		function view_users_undermyaccount($str){
			$table = "friends";
			$where = "friends_userid=".$str;
			$sql = $this->select($table,$where);
			return $this->jrows() > 0 ? $this->jfetch_many($sql) : false;
		}
		
		function view_users_friends_list($str){
			$table = 'date_reg';
			$where = "reg_id IN(".$str.")";
			$sql	= $this->select($table,$where);
			return $this->jrows() > 0 ? $this->jfetch_many($sql) : false;
		}
		
		function users_firewall_stoper($id){
			$str = $this->select('date_reg',"reg_id='".$this->secure($id)."'");
			return $this->jrows() > 0 ? 1 : 0;
		}
		
		function users_angrywall_post($submitter,$post,$id){
			if($this->jpost($submitter)){
				$this->jfields('angry_wall_user_post',$this->secure($post));
				$this->jfields('angry_wall_user_postdate',gmDate("Y-m-d H-i-s"));
				return $this->jSave('angry_wall');
			}
		}
		
		function users_advancesearch($gender,$status="",$country=""){
			#$_firewall = ($this->setSession('user_id') !=="") ? $this->setSession('user_id') : "";	
			$support = '';
			if($status !==""){
				$support .=" && a.reg_interest='".$status."'"; 
			}
			if($country !==""){
				$support .=" && a.reg_country='".$country."'"; 
			}
			#if($_firewall !==""){
				$sql = "SELECT a.reg_first,a.reg_last,a.reg_email from date_reg as a where a.reg_gender='".$gender."'{$support}";
				$tbl = $this->jsql($sql);
				return ($this->jrows() > 0) ? $this->jfetch_many($tbl) : false;
			#}
		}

	}