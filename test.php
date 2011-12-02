<script type="text/javascript" src="js/jquery.js"></script>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="upload" value="1">
<input type="hidden" name="business" value="email@email.com">
<input type="hidden" name="item_name_1" value="Item #1">
<input type="hidden" name="amount_1" value="1.00">
<input type="hidden" name="item_name_2" value="Item #2">
<input type="hidden" name="amount_2" value="2.00">
<input type="submit" value="PayPal">
</form>
<?php
echo "hello world";
echo is_dir('img/');
    $urls ='http://businesscatalyst.com';

    $valid = @fsockopen("$urls", 80, $errno, $errstr, 30);
echo $valid;

	if(isset($_GET['ew'])=='1' && $_GET['uri'] !==""){
		echo "<div id='jc'>";
		$url = @file_get_contents($_GET['uri']);

		$cube = get_p($url);
		$cb ='';
		foreach($cube[0] as $c){
		$cb.=$c;
		}
		if($cb !==""){
			print_r(substr($cb,0,100)."...");
		}else{
			echo "no account";
		}
		$takeh3 = get_h1($url);
		$e = $takeh3;
		if($e){
			foreach($e as $vo){
			//	print("<h1>".$vo[0]."</h1>");
			}
		}
		//print_r($e);
		echo "</div>";
	}
?>

<input type="text" name="urls" id="urls2"><a href="javascript:void(0);" id="whit">search</a>
<div id="result">result</div>
<?php
# CREATED BY:
# CHRISTOPHER CUIZON
# SECRET PHP DEVELOPER
# I've put all my hardwork here so that I can do
# what my master's capable of


// retrieve doctype of document
function get_doctype($file){
    $h1tags = preg_match('/<!DOCTYPE (\w.*)dtd">/is',$file,$patterns);
    $res = array();
    array_push($res,$patterns[0]);
    array_push($res,count($patterns[0]));
    return $res;
}

// retrieve page title
function get_doc_title($file){
    $h1tags = preg_match('/<title> ?.* <\/title>/isx',$file,$patterns);
    $res = array();
    array_push($res,$patterns[0]);
    array_push($res,count($patterns[0]));
    return $res;
}

// retrieve keywords
function get_keywords($file){
    $h1tags = preg_match('/(<meta name="keywords" content="(.*)" \/>)/i',$file,$patterns);
    $res = array();
    array_push($res,$patterns[2]);
    array_push($res,count($patterns[2]));
    return $res;
}

// get rel links in header of the site
function get_link_rel($file){
    $h1tags = preg_match_all('/(rel=)(".*") href=(".*")/im',$file,$patterns);
    $res = array();
    array_push($res,$patterns);
    array_push($res,count($patterns[2]));
    return $res;
}

function get_external_css($file){
    $h1tags = preg_match_all('/(href=")(\w.*\.css)"/i',$file,$patterns);
    $res = array();
    array_push($res,$patterns[2]);
    array_push($res,count($patterns[2]));
    return $res;
}

// retrieve all h1 tags
function get_h1($file){
    $h1tags = preg_match_all("/(<h1.*>)(\w.*)(<\/h1>)/isxmU",$file,$patterns);
    $res = array();
    array_push($res,$patterns[2]);
    array_push($res,count($patterns[2]));
    return $res;
}

// retrieve all h2 tags
    function get_h2($file){
    $h1tags = preg_match_all("/(<h2.*>)(\w.*)(<\/h2>)/isxmU",$file,$patterns);
    $res = array();
    array_push($res,$patterns[2]);
    array_push($res,count($patterns[2]));
    return $res;
}

// retrieve all h3 tags
	function get_h3($file){
    $h1tags = preg_match_all("/(<h3.*>)(\w.*)(<\/h3>)/ismU",$file,$patterns);
    $res = array();
    array_push($res,$patterns[2]);
    array_push($res,count($patterns[2]));
    return $res;
}

// retrieve all h4 tags
function get_h4($file){
    $h1tags = preg_match_all("/(<h4.*>)(\w.*)(<\/h4>)/ismU",$file,$patterns);
    $res = array();
    array_push($res,$patterns[2]);
    array_push($res,count($patterns[2]));
    return $res;
}

// retrieve all h5 tags
function get_h5($file){
    $h1tags = preg_match_all("/(<h5.*>)(\w.*)(<\/h5>)/ismU",$file,$patterns);
    $res = array();
    array_push($res,$patterns[2]);
    array_push($res,count($patterns[2]));
    return $res;
}

// retrieve all h5 tags
function get_h6($file){
    $h1tags = preg_match_all("/(<h6.*>)(\w.*)(<\/h6>)/ismU",$file,$patterns);
    $res = array();
    array_push($res,$patterns[2]);
    array_push($res,count($patterns[2]));
    return $res;
}

// retrieve p tag contents
function get_p($file){
    $h1tags = preg_match_all("/(<p.*>)(\w.*)(<\/p>)/ismU",$file,$patterns);
    $res = array();
    array_push($res,$patterns[2]);
    array_push($res,count($patterns[2]));
    return $res;
}

// retrieve names of links
function get_a_content($file){
    $h1count = preg_match_all("/(<a.*>)(\w.*)(<.*>)/ismU",$file,$patterns);
    return $patterns[2];
}

// retrieve link destinations
function get_a_href($file){
    $h1count = preg_match_all('/(href=")(.*?)(")/i',$file,$patterns);
    return $patterns[2];
}

// get count of href's
function get_a_href_count($file){
    $h1count = preg_match_all('/<(a.*) href=\"(.*?)\"(.*)<\/a>/',$file,$patterns);
    return count($patterns[0]);
}

//get all additional tags inside a link tag
function get_a_additionaltags($file){
    $h1count = preg_match_all('/<(a.*) href="(.*?)"(.*)>(.*)(<\/a>)/',$file,$patterns);
    return $patterns[3];
}

// retrieve span's
function get_span($file){
    $h1count = preg_match_all('/(<span .*>)(.*)(<\/span>)/',$file,$patterns);
    $res = array();
    array_push($res,$patterns[2]);
    array_push($res,count($patterns[2]));
    return $res;
}

// retrieve spans on the site
function get_script($file){
    $h1count = preg_match_all('/(<script.*>)(.*)(<\/script>)/imxsU',$file,$patterns);
    $res = array();
    array_push($res,$patterns[2]);
    array_push($res,count($patterns[2]));
    return $res;
}

// retrieve content of ul's
function get_ul($file){
    $h1count = preg_match_all('/(<ul \w*>)(.*)(<\/ul>)/ismxU',$file,$patterns);
    $res = array();
    array_push($res,$patterns[2]);
    array_push($res,count($patterns[2]));
    return $res;
}

//retrieve li contents
function get_li($file){
    $h1count = preg_match_all('/(<li \w*>)(.*)(<\/li>)/ismxU',$file,$patterns);
    $res = array();
    array_push($res,$patterns[2]);
    array_push($res,count($patterns[2]));
    return $res;
}

// retrieve page comments
function get_comments($file){
    $h1count = preg_match_all('/(<!--).(.*)(-->)/isU',$file,$patterns);
    $res = array();
    array_push($res,$patterns[2]);
    array_push($res,count($patterns[2]));
    return $res;
}

// retrieve all used id's on the page
function get_ids($file){
    $h1count = preg_match_all('/(id="(\w*)")/is',$file,$patterns);
    $res = array();
    array_push($res,$patterns[2]);
    array_push($res,count($patterns[2]));
    return $res;
}

// retrieve all used classes ( inline ) of the document
function get_classes($file){
    $h1count = preg_match_all('/(class="(\w*)")/is',$file,$patterns);
    $res = array();
    array_push($res,$patterns[2]);
    array_push($res,count($patterns[2]));
    return $res;
}

// get the meta tag contents
function get_meta_content($file){
    $h1count = preg_match_all('/(<meta)(.*="(.*)").\/>/ix',$file,$patterns);
    $res = array();
    array_push($res,$patterns[2]);
    array_push($res,count($patterns[2]));
    return $res;
}

// get inline styles
function get_styles($file){
    $h1count = preg_match_all('/(style=")(.*?)(")/is',$file,$patterns);
    $res = array();
    array_push($res,$patterns[2]);
    array_push($res,count($patterns[2]));
    return $res;
}

// get titles of tags
function get_tag_titles($file){
    $h1count = preg_match_all('/(title=)"(.*)"(.*)/',$file,$patterns);
    $res = array();
    array_push($res,$patterns[2]);
    array_push($res,count($patterns[2]));
    return $res;
}

// get image alt descriptions
function get_image_alt($file){
    $h1count = preg_match_all('/(alt=.)([a-zA-Z0-9\s]{1,})/',$file,$patterns);
    $res = array();
    array_push($res,$patterns[2]);
    array_push($res,count($patterns[2]));
    return $res;
}




//curl


function get_file1($file, $local_path, $newfilename){
    $err_msg = '';
    echo "<br>Attempting message download for $file<br>";
    $out = fopen($newfilename, 'wb');
    if ($out == FALSE){
      print "File not opened<br>";
      exit;
    }
   
    $ch = curl_init();
           
    curl_setopt($ch, CURLOPT_FILE, $out);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_URL, $file);
               
    curl_exec($ch);
    echo "<br>Error is : ".curl_error ( $ch);
   
    curl_close($ch);
    //fclose($handle);

}
//foreach($cube as $row):


 //get_file1("http://mctavish.blacksaltstudio.com".$row,"http://localhost/curl/","test.jpg");
//endforeach;




// retrieve images on the site
function get_images($file){
    $h1count = preg_match_all('/(<img)\s (src="([a-zA-Z0-9\.;:\/\?&=_|\r|\n]{1,})")/isxmU',$file,$patterns);
    $res = array();
    array_push($res,$patterns[3]);
    array_push($res,count($patterns[3]));
    return $res;
}

// retrieve email address of the mailto tag if any
function get_mailto($file){
    $h1count = preg_match_all('/(<a\shref=")(mailto:)([a-zA-Z@0-9\.]{1,})"/ims',$file,$patterns);
    $res = array();
    array_push($res,$patterns[3]);
    array_push($res,count($patterns[3]));
    return $res;
}

// retrieve any email
function get_emails($file){
    $h1count = preg_match_all('/[a-zA-Z0-9_-]{1,}@[a-zA-Z0-9-_]{1,}\.[a-zA-Z]{1,4}/',$file,$patterns);
    $res = array();
    array_push($res,$patterns[0]);
    array_push($res,count($patterns[0]));
    return $res;
}

// count used keywords
function countkeyword($word,$file){
    $x = preg_match_all("/(.*)($word)(.*)/",$file,$patterns);
    return count($patterns);
}

// retrieve internal site links
function get_internal_links($array){
    $result = array();
    $count = count($array);
        for($i=0;$i<$count;$i++){
            if(!empty($array[$i])){       
                if(strpos($array[$i],"www",0) === false){
                    if(strpos($array[$i],"http",0) === false){                   
                        array_push($result,$array[$i]);
                    }
                }
            }
        }
    return $result;
}

// retrieve external links
function get_external_links($array){
    $result = array();
    $count = count($array);
        for($i=0;$i<$count;$i++){
            if(!empty($array[$i])){       
                if(strpos($array[$i],"www",0) !== false){
                    if(strpos($array[$i],"http",0) !== false){                   
                        array_push($result,$array[$i]);
                    }
                }
            }
        }
    return $result;
}

// retrieve the main url of the site
function get_main_url($url){
    $parts = parse_url($url);
    $url = $parts["scheme"] ."://".$parts["host"];
    return $url;
}

// retrieve just the name without www and com/eu/de etc
function get_domain_name_only($url){
    $match = preg_match("/(.*:\/\/)\w{0,}(.*)\.(.*)/",$url,$patterns);
    $patterns[2] = str_replace(".","",$patterns[2]);
    return $patterns[2];
}

$url = 'http://jquery.com/';
//echo file_get_contents($url);
//echo file_get_contents($url);
?>
