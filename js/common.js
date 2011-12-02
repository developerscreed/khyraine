// JavaScript Document
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
			jQuery(this).show('slow');
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

	jQuery(function(){
		getMenuPages();
		register();
	});