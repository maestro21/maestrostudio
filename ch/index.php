<?php include('common.php'); ?>
<!DOCTYPE HTML>
<html>
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php echo $path;?>favicon.ico" type="image/x-icon">

        <!-- SEO part -->
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title><?php echo t('title');?></title>
        <meta name="description" content="<?php echo htmlentities(t('description'));?>">

        <!-- Fonts, icon, viewport, misc meta-->
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic' rel='stylesheet' type='text/css'>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">

		<!-- jQuery -->
        <script src="<?php echo $path;?>js/jquery.min.js"></script>	  
        <!-- FontAwesome -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <!-- Peeling -->
        <script type="text/javascript" src="<?php echo $path;?>jsp/jquery.pagepiling.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo $path;?>jsp/jquery.pagepiling.css" />

        <!-- Main JS & CSS -->
        <link rel="stylesheet" href="<?php echo $path;?>css/style.css?v=1" type="text/css">
        <script>var BASE_URL = '<?php echo $path;?>';</script>
		<script src="<?php echo $path;?>js/script.js?v=2"></script>
        <!-- eof HEAD -->
	</head>
	<body>
			<!-- Header -->
			<div class="header">
                <div class="wrap">
                    <div class="logo">
                        <img src="<?=img('logo.png');?>" height="50" title="Maestro Studio">
                    </div>
                    <div id="menu" class="menu">                        
                        <?php foreach($menu as $k =>$v) { ?>
                            <a  data-menuanchor="<?=$k;?>" href="#<?=$k;?>"><?=$v;?></a>
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
			<div class="fullpage">
                <?php include('data/'.$lang.'/content.php'); ?>  

                <div id="contacts" class="section darker" style="<?=img('bg/bg5.jpg', 2);?>" data-anchor="contacts">       
                    <h1><?php echo T('Contacts');?></h1>
                                          
                    <div class="center">
                            <div>
                                <p><span class="icon"><i class="fas fa-mobile-alt" aria-hidden="true"></i></span>&nbsp;<a href="tel:+41787320722">+41 787 32 07 22</a></p>
                                <p><span class="icon"><i class="far fa-envelope" aria-hidden="true"></i></span>&nbsp; <a href="mailto:sergeyspopov@gmail.com">sergeyspopov@gmail.com</a></p>
                                <p><span class="icon"><i class="fab fa-skype" aria-hidden="true"></i></span>&nbsp; <a href="skype:sergeyspopov">sergeyspopov</a></p>
                            </div>
                        </div>  
                    <div class="wrap">  
                        <p class="contacts_msg"><?php echo T('contacts_msg');?></p>
                        <div class="form">     
                            <form id="contactForm" method="post">    
                                <input type="hidden" name="lang" value="<?php echo $lang;?>">                   
                                <div class='td'>
                                    <table>
                                        <tr>
                                            <td class="label"><?php echo T('Name');?>:</td>
                                            <td><input name="name"></td>
                                        </tr>
                                        <tr>
                                            <td class="label"><?php echo T('Phone');?>:</td>
                                            <td><input name="phone"></td>
                                        </tr>
                                        <tr>
                                            <td class="label"><?php echo T('Email');?>:</td>
                                            <td><input name="email"></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class='td'>
                                    <p><?php echo T('Your message');?>:</p>
                                    <textarea name="message"></textarea>
                                    <center>
                                        <button class="btn big btn_submit"><?php echo T('Submit');?></button>   
                                    </center> 
                                </div>                                                                                            
                                <div class="submit_msg"><?php echo T('submit_msg');?></div>
                            </form>
                        </div>
                        <p></p>  
                    </div>
                </div>   


                <div id="impressum" class="section top" style="<?=img('bg/bg1.jpg', 2);?>" data-anchor="impressum">

                    <h1>Impressum</h1>
                    <div class="center">
                        <div class="wrap">
                            <p><b>Firmenname</b>: S. Popov's Maestro Studio</p>
                            <p><b>Firmennummer</b>: CHE-234.270.030</p>
                            <p><b>Rechsnatur</b>: Einzelunternehmen</p>        
                            <p><b>Inhaber</b>: Sergei Popov</p>
                            <p><b>Domiziladresse</b>: <br>
                                <div class="tab">
                                    S. Popov's Maestro Studio<br>
                                    c/o Sergei Popov<br>
                                    Carl-Beck-Strasse 14b<br>
                                    6210 Sursee, LU<br>
                                    Schweiz</p>
                                </div>
                        </div>
                        <p></p>
                        <p></p>
                    </div>
                </div>    
			</div>
                    
            

            <!-- Footer -->            
            <div class="footer">
                <div class="wrap">
                    <div class="copy">&copy; <?=date('Y');?> Maestro Studio</div>
                </div>    
            </div> 
            
	</body>
</html>	
