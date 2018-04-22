<?php include('common.php'); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $sitename;?></title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="<?php echo $path;?>img/favicon.ico" type="image/x-icon">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
         <link href='https://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic' rel='stylesheet' type='text/css'>

		<!-- CSS-->
		<!--<link rel="stylesheet" type="text/css" href="<?php echo $path;?>css/jquery.fullPage.css" />-->
		<link rel="stylesheet" href="<?php echo $path;?>ext/fa/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo $path;?>css/style.css?v=1" type="text/css">

		<!-- JS -->
		<script src="<?php echo $path;?>js/jquery.min.js"></script>			
		<!--<script src="<?php echo $path;?>js/jquery.fullPage.min.js"></script>-->
		<script src="<?php echo $path;?>js/script.js"></script>
        
        <!-- Slick -->
        <link rel="stylesheet" href="<?php echo $path;?>ext/slick/slick.css">
        <link rel="stylesheet" href="<?php echo $path;?>ext/slick/slick-theme.css">
        <script src="<?php echo $path;?>ext/slick/slick.min.js"></script>
	</head>
	<body>
			<!-- Header -->
			<div class="header">
                <div class="wrap">
                    <div class="logo">
                        <img src="<?=img('logo.png');?>" height="50" title="Maestro Studio">
                    </div>
                    <div class="menu">                        
                        <?php foreach($menu as $k =>$v) { ?>
                            <a href="#<?=$k;?>"><?=$v;?></a>
                        <?php } ?>
                    </div>                    
                    <div class="hamburger">&#9776;</div>    

                    <div class="langs">
                        <?php foreach ($langs as $l => $name) { ?>
                            <a href='<?=BASE_PATH . $l;?>'><img src='<?=img('lang/'.$l .'.png');?>' <?=($lang == $l?" class='active'":'');?> title='<?=$name;?>'></a>
                        <?php } ?>
                    </div>
                </div>
			</div>

			<!-- Content-->
			<div class="content fullpage">
                <?php include('data/'.$lang.'/content.php'); ?>  
			</div>

			<!-- Footer -->
			<div class="footer">
                <div class="wrap">
                    <div class="copy">&copy; <?=date('Y');?> Maestro Studio</div>
                </div>    
			</div>
            
		</div>	
	</body>
</html>	
