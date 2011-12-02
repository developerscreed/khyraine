<?php 
	session_start();
	require('../../lib/config.php');
	require('../../lib/users.class.php');
	$seuser = new users;
	global $jlib;
				$st = $jlib->jpost('start') !=="" ? $jlib->secure($jlib->jpost('start')) : 0;
				$en = $jlib->jpost('end') ? $jlib->secure($jlib->jpost('end')) : 4;

				$datas = $seuser->profile_wall_shoutout($st,$en);
					
				if($datas>0){
					foreach($datas as $fullwall):	
				?>		   
			
                                    <div class="form_wrap">
                                        <div class="form_tr">
                                            <div class="form_td wallgtd">
                                                <img style="height: 50px;" src="img/bc.jpeg">
                                            </div>
                                            <div class="form_td wallmessage">
												<?php $post_the_user =  $seuser->profile_user_data($fullwall['user_id']);
													echo "<strong>".$post_the_user->reg_first." ".$post_the_user->reg_last."</strong><br />";
												?>
                                                <?php 	echo $jlib->cleardata($fullwall['pro_wall']);?>
												<div class="clear"></div>
												<br />
												<?php echo $fullwall['wall_date'];?>
                                                    <a class="wall_likes" href="javascript:void(0);" id="like<?php echo $fullwall['pro_id'];?>">+</a>
                                                    
                                                     <a class="wall_delete" href="javascript:void(0);" id="delete<?php echo $fullwall['pro_id'];?>">x</a>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>     
				<?php        
					
					endforeach;	
				}
				?>
			