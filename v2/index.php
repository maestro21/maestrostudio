<?php 
include('common.php');


if($page == 'mail') {
    sendMail();
}

$page = getPageUrl($page); 

if(file_exists("data/{$page}.php")) {
	$content = tpl($page, [], true);
} else {
	$content = tpl($deflang, [], true);
}

if($menumultilevel) {
    $title = getPageTitle($page);
} else {
    $title = (isset($menu[$page]) ? $menu[$page] : '');
}


$data = [
	'content' => $content,	
	'frontpath' => $frontpath,
	'lang' => $lang,
	'path' => $path,
	'sitename' => $sitename,
];

echo tpl('main', $data);
