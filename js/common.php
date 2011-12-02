// JavaScript Document
// Contact me if you like my website
// christophercuizons@gmail.com
// this website is only for fun any copyrights of the website content is not my responsibility

var $setupCore;

	function register(){
		$("input[id^='register']").live('click',function(){
			var u_reg = jQuery("input[id^='user']").val();
			var p_reg = jQuery("input[id^='password']").val();
			var e_reg = jQuery("input[id^='email']").val();
			jQuery.post("ajax/ajax.php",
				{'user':u_reg,'ps':p_reg,'email':e_reg,'reg':1,'core':$setupCore},
				function(html){
					jQuery(".form_wrap").fadeOut('slow',function(){
						jQuery(this).remove();
						jQuery('#regmessage').html(html);
						jQuery("#regmessage").fadeIn('slow');
				});
			});
		});
	}
	
	function ajaxloaders(){
		var $counter;
		jQuery(".ajaxmsgr").ajaxStart(function(){
			jQuery(this).show('fast');
			$counter = 1;
		}).ajaxStop(function(){
			jQuery(this).hide('slow');
		});
	}
	
	function getMenuPages(){
		jQuery("ul.nav a").click(function(){
			var $getid = jQuery(this).attr("id");
				$setupCore = $getid; 
				jQuery(".content").load('inc/'+$getid+'.php').fadeIn('slow');			
		});
	}
	
	// this is for the profile javascript 
	function hover_profile(){
		jQuery(".profile a").live("hover",function(){
			var $_source = jQuery(this).find("img").attr("src");
				jQuery(".rightprofile").html("<img src='"+$_source+"'>").show("fast");
		},function(){
			jQuery(".rightprofile").html("Details").hide('fast');
		});
	}
	// end for profile javascript
	
	
	//post on wall
	
	function postwall_recent(){
		var $getRecentShout = jQuery("input[id^='profileshout']").val();
			var src = jQuery('.profile').find("img").attr("src");	
			jQuery(".postwallsection .messageboard").slideDown('slow',function(){
				$headers = '<div class="form_wrap">';
				$headers +='<div class="form_tr">';
				$headers +='<div class="form_td wallgtd">';
				$pagecontents  = '<div class="form_td wallmessage">';
				$thedates 	= "<?php echo gmDate("Y-m-d H:i:s");?>";
				$getIdimg 	= "<img src='"+ src +"' style='widows:50px;height:50px;'></div>";
				$likes 		= "<br />Posted : "+ $thedates +"<a href='javascript:void(0);' class='wall_likes'>+</a>";
				$footers =  "</div><div class='clear'></div></div></div><div class='clear'></div>";

				if($getRecentShout !==""){
					jQuery(this).prepend($headers + $getIdimg + $pagecontents + $getRecentShout + $likes + $footers).hide().fadeIn('slow');
					wallpost_ajax($getRecentShout);
					jQuery("input[id^='profileshout']").val('');
				}return false;
			});
	}
	
	function post_on_wall(){
		jQuery("#shoutout").live('click',function(){
		postwall_recent();
		});
	}
	
	function on_postwall_enter(){
		jQuery("input[id^='profileshout']").live("keypress",function(e){
			if(e.which == 13){
				postwall_recent();
			return false;
			}
		});

	}

	//end post wall
	
    //post query on the wall
	function wallpost_ajax($txt){
		jQuery.post("ajax/ajax.php",{'pro_wall':$txt,'core':'postwall'});
	}
    //end function
    
    // delete on the wall
	function wallajax_delete($str){
		var cleanstr = $str;
		var washedstr = cleanstr.split("delete");
		return jQuery.post("ajax/ajax.php",{'pro_wall_delete':$str,'core':'deletewall'});
	}
    // profile end delete on wall
	
    // wall msg delete
	function wallpost_delete(){
		jQuery(".wall_delete").live('click',function(){
			var $get_ids = jQuery(this).attr("id");
			jQuery(this).parent().parent().parent().fadeOut('slow',function(){
				jQuery(this).remove();
				wallajax_delete($get_ids);
			});
		});
	}
    // end of wall delete
    
    // profile tabbing for walls ajax
	function profile_tabs(){
		jQuery("ul#profile_menu li a").live("click",function(){
			var $get_id = jQuery(this).attr("id");	
			setTimeout(function(){
				jQuery(".messageboard").load("inc/profile/wall-list.php",{start:0,end:15});
			},1000);
			return ($get_id !=="") ? jQuery(".wall").load("inc/profile/"+ $get_id +".php").hide().fadeIn('slow') : false;	
		});
	}
    //end for profile tabbing aajax
    
    //function for profile_menu_tabbing
	function profile_menu_status(){
		jQuery("ul#status_prof_info li a").live('click',function(){
			var $getdatax = jQuery(this).attr("data");	
				jQuery(".dinfo").each(function(){
					var $getdatay = jQuery(this).attr("data");
						if($getdatax == $getdatay){
							jQuery(this).show('fade',{},'slow');
						}else{
							jQuery(this).hide();
						}
				});
		});
	}
    
    // end for profile menu tabbing
    
	//function for pagination ajax
	function wall_shout_getlist(){	
		jQuery(".pagilitoy").live('click',function(){
			var findstart = jQuery(this).attr("start");
			var findend   = jQuery(this).attr("end");
			 	jQuery(".messageboard").load("inc/profile/wall-list.php",{start:findstart,end:findend});
		});
	}
	// end function
	
	// wall saving dates on the list
	function savedates(){	
		jQuery("#savedates").live('click',function(){
			//var getlistdates=[];
			//jQuery("#trash li.ui-widget-content").each(function(){
			//	var findimg = jQuery(this).find("img").attr("dateid");
			//	var getfinalsize = jQuery(this).length;   
			//		getlistdates.push(findimg);

			//});
			//var takeids = getlistdates.join(",");
			
		});
	}
	
	// end wall of dates
	
	// to show and hide chats
	function openchat(){
		jQuery("#ok").live("click",function(){
			jQuery("#outer").slideToggle();
			jQuery(".wannachat").switchClass("hidechat","viewchat",200);
			jQuery(".viewchat").switchClass("viewchat","hidechat",200);	
		});
	}
	
	// end show and hide chats
	
	function profile_defaultpage(){
		jQuery(".content").fadeIn('slow');
		jQuery(".content").load("inc/profile.php");
	}
	
	/* this is on the footer account on which there is a slidetoggle functionalities */
	function Fusers_footer_stats(){
		jQuery(".emailfrnd a").click(function(){
			var shouthref = jQuery(this).attr("shout");
				jQuery(".noted").each(function(){
					var shoutid = jQuery(this).attr("id");
					if(shouthref == shoutid){
						jQuery("#"+shoutid).fadeIn('slow');
					}else{
						jQuery(this).hide();
					}
				});
			});
	}
	
	function Fclose_footermenu(){
		jQuery("#closemenu").click(function(){	jQuery(".noted").hide('slow'); });
	}
	
	function Fsendemail_toallmyfriends(){
		jQuery("#chooseEmail").live('click',function(){
			jQuery(".emailtofriends_list").load('inc/footer_status/sendemail.php').hide().fadeIn('slow');
		});
	}
	
	function Frecipeint_select(){
		jQuery(".addme_email").live('click',function(){
			var $get_emails = jQuery(this).attr("statsemail");
			var $value_recipeint_email = jQuery("input[id^='account_email_sender']").val();
			if($value_recipeint_email.indexOf($get_emails) == -1){
				jQuery("input[id^='account_email_sender']").val($value_recipeint_email+$get_emails);
			}
		});
		jQuery("#clearEmail").live('click',function(){jQuery("input[id^='account_email_sender']").val('')});
	}
	
	/*	end of the functionalities 	*/
	
	/* this functions post the angry wall area	*/
	
	function Pangray_post(){
		jQuery("#angrypostsubmit").live('click',function(){
			jQuery.post("ajax/ajax.php",{core:'angrywall'},function(html){
    			jQuery("#angrycontainers").append("<span>"+html+"</span>");
			});
		});
	}
	
	/* end of angry wall area	*/
	/* this is for advance search section */
	
	function AdvanceSearch(){
	
		jQuery("#advSearch").live('click',function(){	
			jQuery("#connect-searchresults").hide();
			var $takegender = jQuery("#advgender option:selected").val();
		
			jQuery.post("ajax/ajax.php",{'core':'advancesearch','gender':$takegender},function(JSON){
				jQuery("#search-results").html(JSON);
				jQuery("#connect-searchresults").fadeIn(4000);
			});
			jQuery("#search-loading").ajaxStart(function(){
				jQuery(this).html('Searching...').hide().fadeIn('slow').fadeOut(3000);
			});

		});
	}
	/* end of advance search */
	
	
	jQuery(function(){
		//set up loaders
				ajaxloaders();
		//end of loaders

		getMenuPages();
		register();
		profile_defaultpage();
		
		//this script is for profile
			profile_tabs();
			profile_menu_status();
			post_on_wall();
			on_postwall_enter();
			wallpost_delete();
			wall_shout_getlist();
			savedates();
		//end 
		
		//chat functionalities
			openchat();
		// end of chats
		
		//for profile footer
			Fusers_footer_stats();
			Fclose_footermenu();
			Fsendemail_toallmyfriends();
			Frecipeint_select();
		//end for profile footer
		
		Pangray_post();
		AdvanceSearch();
		new nicEditor({fullPanel : true}).panelInstance('recipientmsg');
	
	});