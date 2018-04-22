<?php
if(!isset($_POST['message']) && !isset($_GET['parolinenadozabivatj'])) die();

$path = 'data/msgs.php';
if(!file_exists($path)) {
    file_put_contents($path, '<?php $msgs = [];');
}
require_once($path);

if($_POST) {
    if(
        empty($_POST['name']) &&
        empty($_POST['phone']) &&
        empty($_POST['email']) &&
        empty($_POST['message']))
        die();


    /* Process data */
    $data = array_flip(['time', 'lang', 'name', 'phone', 'email', 'message']);    
    $data['time'] = date("Y-m-d H:i:s");
    foreach($data as $k => $v) { 
        if($k != 'time') $data[$k] = (isset($_POST[$k]) ? $_POST[$k] : '');
    }
    array_unshift($msgs, $data);
    file_put_contents($path, '<?php $msgs = ' . var_export($msgs, true) .';');

    /* Send mail */
    $mail = true;
    if($mail) {
		
		$replyto = $data['email'];
		$replyto_name = $data['name'];
        $subj = "Новое сообщение от " .  $data['name'] . " (" . $data['lang'] . ')';        
        $message = $data['name'] . ' ✉ ' . $data['email'] . ' ✆ ' . $data['phone'] . PHP_EOL . PHP_EOL  . $data['message'];
		$html =    '<b>' . $data['name'] . ' ✉ ' . $data['email'] . ' ✆ ' . $data['phone'] . '</b><br><br>'  . $data['message'];
	
		$data = [
			'from' => 'info@webstudio-maestro.ch',
			'from_name' => 'Maestro Studio',			
			'to' => 'sergeyspopov@gmail.com',
			'to_name' => 'Sergey Popov',
			
			'replyto' => $replyto,
			'replyto_name' => $replyto_name, 
			'subj' => $subj,
			'text' => $message,
			'html' => $html,
		];
		require 'mail/mail.php';
		
		sendmail($data);
		
		/*
        $headers  = "Organization: Maestro Studio\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/plain; charset=utf-8 \r\n"; 
        $headers .= "X-Mailer: PHP". phpversion() ."\r\n"; 
        $headers .= "Reply-To: Maestro Studio <noreply@maestrostudio.ch>\r\n"; 
        $headers .= "Return-Path: Maestro Studio <noreply@maestrostudio.ch>\r\n";
        $headers .= "From: Maestro Studio <noreply@maestrostudio.ch>\r\n"; 
        $headers .= "Bcc: " .$data['email'] . "\r\n";

        mail($mail, $subj, $message, $headers); */
    }

}

if(isset($_GET['parolinenadozabivatj'])) {
    echo "<h1>Messages</h1>";
    if(empty($msgs)) {
        echo "No messages"; die();
    }
    foreach($msgs as $row) {        
        echo "<hr>";
        foreach($row as $k=>$v) {
            echo "$k: "; if($k == 'message') echo "<br>";
            echo "<b>$v</b><br>";
        }
    }
}

