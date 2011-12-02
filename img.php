<?php  
$gu_siteid="xp4skja";
echo $_SERVER['HTTP_REFERER'];
$gu_param = "st=".$gu_siteid."&ref=".urlencode($_SERVER['HTTP_REFERER']).
"&vip=".$_SERVER['REMOTE_ADDR']."&ua=".urlencode($_SERVER['HTTP_USER_AGENT']).
"&cur=".urlencode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'])."&b=5";

@readfile("http://counter.goingup.com/phptrack.php?".$gu_param);

?>