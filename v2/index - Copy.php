<?php 
include('common.php');


if($page == 'mail') {
    sendMail();
}

$page = getPageUrl($page);

if(file_exists("data/pages/{$page}.php")) {
	$content = tpl("pages/{$page}", [], true);
} else {
	$content = tpl("pages/{$deflang}", [], true);
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
