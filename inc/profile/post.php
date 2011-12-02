<?php session_start();

	require('../../lib/config.php');
	require('../../lib/users.class.php');
	$seuser = new users;
	global $jlib;

?>
	<div class="form_wrap">
	<!-- username -->
		<div class="form_tr">
			<div class="form_td rgtd">
				<input type="text" name="profileshout" id="profileshout" style="width:600px;" >
				<a href="javascript:void(0);" id="shoutout">Post</a>
			</div>
			<div class="clear"></div>
			<div class="postwallsection">
			<?php
					$profilewallcount = $seuser->profile_wall_pagination($_SESSION['user_id']);
					$numberofcount =  $profilewallcount[0];
					$totcount = floor($numberofcount /10);
					
					$counter2=0;
					$endcount=0;
					$my =1;
					for($x = 0;$x<$totcount;$x++):
						$pagi_num = $my++;
							$endcount=$endcount+10;
							echo "<a href='javascript:void(0);' start='".$counter2."' end='".$endcount."' class='pagilitoy' >".$pagi_num."</a>";
							$counter2 = $counter2+10;
							
					endfor;
			?>
				<div class="messageboard">
				
				</div>
			</div>
			
			
		</div>
	</div>
				
			