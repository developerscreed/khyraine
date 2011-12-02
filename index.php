<?php
	session_start();
	require('lib/config.php');
	require('lib/users.class.php');
	$secuer =  new users;
	global $jlib;
	
	//$jlib->login_access_pass();
	
	if($secuer->login_require()){
		$jlib->redirect('core.php');		
	}

	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-min.js"></script>
<link rel="stylesheet" type="text/css" href="styles.css" />
<link rel="shortcut icon" href="favicon.ico" />
</head>

<body>
<div id="container">
	<div class="ajaxmsgr"><img src="img/ajax-loader.gif"></div>
	<div class="content">
	<form method="post">
    <div class="form_wrap">
				<!-- username -->
					<div class="form_tr">
						<div class="form_td" style="width:90px;">
							Username
						</div>	
                        <div class="form_td">
							<input type="text" name="secureuser" id="secureuser" />
						</div>
						
					</div>
                    
                    <div class="form_tr">
						<div class="form_td" style="width:90px;">
							Password
						</div>	
                        <div class="form_td">
							<input type="text" name="securepass" id="securepass" />
						</div>
						
					</div>
                   	<div class="form_tr">
						<div class="form_td" style="width:90px;">
							<input type="submit" name="securesubmit" id="securesubmit"  value="Login"/>
						</div>	
                       
						
					</div>
                    
                    
                    
                    
			</div>
    </form>
	</div>
</div>
<script type="text/javascript">
jQuery(".content").fadeIn('slow');
</script>

</body>
</html>
