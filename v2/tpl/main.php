<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $sitename;?></title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="<?php echo $frontpath;?>img/favicon.ico" type="image/x-icon">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic' rel='stylesheet' type='text/css'>

		<!-- CSS-->
		<link rel="stylesheet" type="text/css" href="<?php echo $frontpath;?>jquery.fullPage.css" />
		<link rel="stylesheet" href="<?php echo $frontpath;?>fa/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo $frontpath;?>style_flex.css" type="text/css" media="screen and (max-width: 1600px)">
        <link rel="stylesheet" href="<?php echo $frontpath;?>style.css" type="text/css" media="screen  and (min-width: 1600px)">

		<!-- JS -->
		<link rel="icon" href="<?php echo $frontpath;?>img/favicon.ico" type="image/x-icon">
		<script src="<?php echo $frontpath;?>script/jquery.min.js"></script>
		<script src="<?php echo $frontpath;?>script/scrolloverflow.min.js"></script>
		<script src="<?php echo $frontpath;?>script/jquery.fullPage.min.js"></script>
		<script src="<?php echo $frontpath;?>script/script.js"></script>
	</head>
	<body>
			<!-- Header -->
			<div class="header">
                <div class="wrapper">
                    <div class="logo">
                        <h1><img src="<?php echo $frontpath;?>img/logo.png" height="75" align="center">aestro Studio</h1>
                    </div>

                    <div class="langs">
                        <?php langs();?>
                    </div>

                    <div class="menu" id="menu">
                        <?php drawMenu();?>
                    </div>
                </div>
			</div>

			<!-- Content-->
			<div class="content">
                <div class="fullpage">
                    <?php echo $content; ?>
                </div>    
			</div>

			<!-- Footer -->
			<div class="footer">
                <div class="wrapper">
                    <div class="copy">&copy; <?=date('Y');?> Maestro Studio</div>
                </div>    
			</div>

			<!-- Sidebar contacts -->
			<div class="contacts">
				<h2><?=T('Sergei Popov');?></h2>
				<p class="phone">+41 787 320 722</p>
				<p class="email">sp@maestrostudio.ch</p>
				<p class="btns">
					<a class="round" href="<?php echo $path . $lang;?>/contact"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
					<a class="round red" href="<?php echo $path . $lang;?>/contact"><i class="fa fa-phone" aria-hidden="true"></i></a>
				</p>
				</div>	
			</div>
			
		</div>			
		
	</body>
</html>	