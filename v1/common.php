<?php 
/** SITE SETTINGS **/
$path = 'http://localhost/maestrostudio/';
$frontpath = $path . 'front/';
$sitename = 'Maestro Studio';
$mail = 'sergeyspopov@gmail.com';
$langs = [  'de' => 'Deutsch', 'en' => 'English', 'ru' => 'Русский' ];
$deflang = 'de';
$menumultilevel = true;
$mailform = true;
$theme = NULL;

/** LOGIC **/
session_name($path);
session_start(); 
header("Content-type: text/html; charset=utf-8");
define('BASE_PATH', $path);

$page = @$_GET['q'];
$pages = explode('/', $page);
$lang = (isset($langs[$pages[0]]) ? $pages[0] : $deflang); 

include("data/i18n/{$lang}.php");
include("data/menu_{$lang}.php");


/** Functions **/
function langs() {
    global $langs, $frontpath;    
    foreach ($langs as $lang => $name) {
		echo "<a href='" . BASE_PATH . $lang . "'><img src='{$frontpath}img/$lang.png' alt='$name' text='$name'></a> ";
    }
}

function T($text=''){
	global $labels;
	return (@$labels[$text]!=''?$labels[$text]:$text);
}


/** TEMPLATE FUNCTION **/

/**
	Main function to display template; 	
	Can be called -anywhere- in code.
	
	@$_TPL string - path to template;
	@$vars array - template variables;
	@return string - parsed tempate html;
**/
function tpl($_TPL, $vars=array(), $data = false){

	$_path = '/' . $_TPL . '.php';
	if($data) $_path = 'data' . $_path; else $_path = 'tpl' . $_path; 	

	if(!file_exists($_path)) return false;

	foreach ($vars as $k =>$v){  
		if(!is_array($v) && !is_object($v))
			$$k=html_entity_decode(stripslashes($v)); 
		else
			$$k=$v;
	}	
		
	ob_start(); 	
	include($_path); 
	$tpl = ob_get_contents();
	ob_end_clean();	
	
	return $tpl;	
}




function redirect($to, $time=0){
	$to = str_replace('#','',$to);
	echo "<html><body><script>setTimeout(\"location.href='$to'\", {$time}000);</script></body></html>"; die();
}


function getPageUrl($url) {
    return str_replace('/', '_', $url);
}

function getPageTitle($url) {
	global $menu;
	$pages = explode('_', $url);
	$tmp = $menu;
	foreach($pages as $page) {
		if(isset($tmp[$page])) {
			$tmp = $tmp[$page];
		} else {
			return false;
		}
	}
	return @$tmp[0];
}


/* send mail */
function sendMail() {
    global $_POST, $mail;
    
    $to = $mail;
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $from = $_POST['from'];
    $name = $_POST['name'];
    
    $headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
    $headers .= "From:  $name <$from>\r\n"; 
    $headers .= "Bcc:  $from\r\n"; 
    
    mail($to, $subject, $message, $headers); 
}

function drawMenu() {  
	global $menu, $lang, $path;
	foreach ($menu as $k => $v) {
		$_path = $path . $lang . ($k != '' ? '/' . $k : '');
		if($k == '') $v = '<i class="fa fa-home"></i>';
		echo "<a href='$_path'>$v</a>";
	} 
}
