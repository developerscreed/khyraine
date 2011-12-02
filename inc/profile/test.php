<div class="form_wrap">
				<!-- username -->
					<div class="form_tr">
						<div class="form_td rgtd">
							<input type="text" name="profileshout" id="profileshout" style="width:600px;" >
							<a href="javascript:void(0);;" id="shoutout">Post</a>
						</div>
						<div class="clear"></div>
						<div class="postwallsection">
				<?php
                                $datas = $seuser->profile_wall_shoutout();								
                                if($datas>0){
                                    foreach($datas as $fullwall):	
				?>		   
                                    <div class="form_wrap">
                                        <div class="form_tr">
                                            <div class="form_td wallgtd">
                                                <img style="height: 50px;" src="img/profile.jpg">
                                            </div>
                                            <div class="form_td wallmessage">
					    <?php $post_the_user =  $seuser->profile_user_data($fullwall['user_id']);
							echo "<strong>".$post_the_user->reg_first." ".$post_the_user->reg_last."</strong><br />";
						?>
                                                <?php echo $jlib->cleardata($fullwall['pro_wall']);?>
						<div class="clear"></div>
						<br />
						<?php echo "Posted\t:".$fullwall['wall_date'];
						?>
                                                    <a class="wall_likes" href="javascript:void(0);;" id="like<?php echo $fullwall['pro_id'];?>">+</a>
                                                    
                                                     <a class="wall_delete" href="javascript:void(0);;" id="delete<?php echo $fullwall['pro_id'];?>">x</a>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>     
				<?php        
									
                                    endforeach;	
                                }
				?>
						</div>
					</div>
			</div>
				