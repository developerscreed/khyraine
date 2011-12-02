<?php
	session_start();
	require('../lib/config.php');
	require('../lib/users.class.php');
	$seuser = new users;
	
	global $jlib;
?>
<div class="profilecontainer">
	<div class="leftprofile">
		<div class="profilename">
			<h3>Profile Name</h3>
		</div>
		<div class="profile">
			<a href="#"><img src="img/bc.jpeg"></a>
			<a href="javascript:void(0);;" style="text-align:center">Add as friend</a><br />
			<a href="javascript:void(0);;">View Photos</a>
		</div>
		<div class="addtocardates">
			
		
		</div>
	</div>
	<div class="rightprofile">
		<div class="profile_sections">
			<div class="profile_nav">
				<ul id="profile_menu">
					<li>
						<a href="javascript:void(0);" id="information">Information</a>
					</li>
					<li>
						<a href="javascript:void(0);" id="post">Post</a>
					</li>
					<li>
						<a href="javascript:void(0);" id="wall">Wall</a>
					</li>
					<li>
						<a href="javascript:void(0);">Send Message</a>
					</li>
					<li>
						<a href="javascript:void(0);" id="angrywall">Angry Wall</a>
					</li>
					
				</ul>
			</div>
			<div class="clear"></div>
			<div class="ajaxmsgr"><img src="img/ajax-loader.gif"></div>
				<div class="wall">
				

				</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
</div>
