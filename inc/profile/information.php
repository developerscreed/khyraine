<?php
	session_start();
	require("../../lib/config.php");
	require("../../lib/users.class.php");
	$seuser = new users;
	global $jlib;
	
	 $uid = $seuser->profile_information();
	
		$state = $seuser->get_profile_info($uid);
	if($state !==""){
?>
<h3>Information</h3><br />
<div class="prof_info">
	<ul id="status_prof_info">
		<li><a href="javascript:void(0);" data="editprofile">Update Profile</a></li>
		<li><a href="javascript:void(0);" data="viewprofile">View Profile</a></li>
		<li><a href="javascript:void(0);" data="hintsprofile">Hints of you Life</a></li>
	</ul>
</div>
<div class="clear"></div>
<!-- this is for the view profile -->
<div class="dinfo" data="viewprofile">
<div class="form_tr" style="border-bottom:1px dashed #c0c0c0;">
			<div class="form_td">
				<strong>Profile Information</strong>
			</div>
</div>

<div class="form_tr">
			<div class="form_td" style="width:70px;">
				First Name
			</div>
			<div class="form_td profedit" style="width:135px;">
				<span><?php echo $state->reg_first;?></span>
			</div>
			<div class="form_td" style="width:70px;">
				Last Name
			</div>
			<div class="form_td profedit">
				<span><?php echo $state->reg_last;?></span>
			</div>
			
</div>

<div class="form_tr">
			<div class="form_td" style="width:70px;">
				Username
			</div>
			<div class="form_td profedit" style="width:135px;">
				<span><?php echo $state->reg_user;?></span>
			</div>
				<div class="form_td" style="width:70px;">
				Email
			</div>
			<div class="form_td profedit">
				<span ><?php echo $state->reg_email;?></span>
			</div>
			
</div>


<div class="clear"></div>

<div class="form_tr" >
			<div class="form_td">
				<span><strong>Date Information</strong></span>
			</div>
			
			
</div>

<div class="form_tr">
			<div class="form_td" style="width:211px;">
				<span>About Yourself</span>
			</div>
			
			<div class="form_td" style="width:70px;">
				<span>My Interest</span>
			</div>
			<div class="form_td">
				<span id="profile_interest">
				<?php 
					$getinterest = $state->reg_interest;
					echo ($getinterest == 0)? "Women " : "Men";
				?></span>
				
			</div>
		
</div>

<div class="form_tr">
			<div class="form_td prof_about">
				<?php echo $state->reg_about_self;?>
			</div>
		
</div>

<div class="form_tr">
			<div class="form_td">
				<a href="javascript:void(0);" id="profile_update">Update</a>
			</div>
		
</div>

</div>

<!-- end for view profile -->
<!-- start update profile-->
<div class="dinfo dnone" data="hintsprofile">
sdaf
</div>
<!-- end of update profile-->
<!-- start for the hints of life -->
<div class="dinfo dnone" data="editprofile">
update
</div>
<!-- end -->


	
<?php  } ?>
<div class="clearB"></div>
