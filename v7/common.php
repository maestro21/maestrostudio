<?php 
/** SITE SETTINGS **/
require_once('settings.php');
$frontpath = $path . 'front/';
$sitename = 'Maestro Studio';
$langs = [  
    'de' => 'Deutsch',	
    'en' => 'English',
	'fr' => 'Français',
	'it' => 'Italiano',	
    'ru' => 'Русский' 
 ];
$deflang = 'de';
$menumultilevel = true;
$mailform = true;
$theme = NULL;

/** LOGIC **/
session_name($path);
session_start(); 
header("Content-type: text/html; charset=utf-8");
define('BASE_PATH', $path);

$pages = ($qget ? @$_GET['q']: getPages()); // print_r($pages); die(); 
$lang = (isset($langs[$pages]) ? $pages : $deflang); 

$lang2 = true;
if($lang2) {
	$top = [$lang => $langs[$lang]]; 
	unset($langs[$lang]); 
	$langs = array_merge($top,$langs);
}

include("data/{$lang}/i18n.php");
include("data/{$lang}/menu.php");


/** Functions **/
function langs() {
    global $langs, $path, $lang;    
    foreach ($langs as $l => $name) {
		echo "<a href='" . BASE_PATH . $l . "'><img src='{$path}img/$l.png' " . ($lang == $l?" class='active'":'') . " title='$name'></a> ";
    }
}

function lang() {
	global $lang;
	return $lang;
}

function T($text=''){
	global $labels;
	return (@$labels[$text]!=''?$labels[$text]:$text);
}
function description() {
	global $mail;
	$ret = str_replace('{mail}', $mail, html_entity_decode(t('description')));
	return $ret;
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

function getPages() {
	global $_SERVER, $path;
	$dir = str_replace('index.php', '', $_SERVER['DOCUMENT_URI']);
	$page = str_replace($dir, '', $_SERVER['REQUEST_URI']);
	$page = explode('?', $page); 
	return $page[0];
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
		$_path = $k;//$path . $lang . ($k != '' ? '/' . $k : '');
		if($k == '') $v = '<i class="fa fa-home"></i>';
		echo "<a data-menuanchor='$_path' href='#$_path'>$v</a>";
	} 
}


function img($name, $display = 0) {
    global $path;    
    $ret = $path . 'img/' .$name;
    switch($display) {
        case 1: return "<img src='$ret' title='$name'>";
        case 2: return "background-image:url('$ret');";
		case 3: return "background-image:url('$ret') !important;";
    }
    return $ret;  
}

function showcase() { global $v;
	include 'data/showcase.php';
}
