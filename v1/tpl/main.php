<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $sitename;?></title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="<?php echo $frontpath;?>style.css" type="text/css" media="screen">	
		<link rel="stylesheet" href="<?php echo $frontpath;?>fa/css/font-awesome.min.css">	
		<link rel="shortcut icon" href="<?php echo $frontpath;?>img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?php echo $frontpath;?>img/favicon.ico" type="image/x-icon">
		<script src="<?php echo $frontpath;?>script/jquery.min.js"></script>			
		<script src="<?php echo $frontpath;?>script/jquery.nicescroll.min.js"></script>		
		<script src="<?php echo $frontpath;?>script/script.js"></script>
	</head>
	<body>
		<div class="wrapper">
				<div class="langs">
					<?php langs();?>
				</div>
			<div class="header">
				<div>
				<h1><img src="<?php echo $frontpath;?>img/logo.png" class="logo" height="75" align="center">aestro Studio</h1>
				</div>
			</div>
			<div class="menu">
				<?php drawMenu();?>
			</div>
			<div class="main">
				<div class="content">
					<?php echo $content; ?>
				</div>
			</div>
			<div class="footer">
				<div class="copy">&copy; <?=date('Y');?> Maestro Studio</div>
			</div>
				
			<div class="contacts">
				<h2><?=T('Contacts');?></h2>
				sergeyspopov@gmail.com
				<div>
					<p><?=T('Sergey Popov');?></p>
					<p>+41 787 320 722</p>
					<p><a class="contactme" href="<?php echo $path . $lang;?>/contact"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?=T('Contact me');?></a></p>
					
				</div>	
			</div>
			
		</div>			
		
	</body>
</html>	