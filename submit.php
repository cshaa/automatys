<!DOCTYPE html>
<html>
<head>

<link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
<link rel="manifest" href="/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
	<title>AUTOMAT</title>
</head>
<body>
<div id="container">
<header>
	AUTOMAT
</header>

<div id="hlaska">

<?php
$order_number = time();

$margot_price 				= 15;
$tribit_price 				= 15;
$snickers_price 			= 16;
$kofila_price 				= 14;
$straznicke_bramburky_price = 18;
$cocacola_price 			= 20;
$trancetto_price			= 12;
$caprisone_price			= 15;
$menu_price					= 30;


$margot_input 					= $_POST['margot'];
$tribit_input 					= $_POST['tribit'];
$snickers_input					= $_POST['snickers'];

$kofila_input					= $_POST['kofila'];
$straznicke_bramburky_input 	= $_POST['straznicke_bramburky'];
$cocacola_input					= $_POST['cocacola'];

$trancetto_input				= $_POST['trancetto'];	
$caprisone_input				= $_POST['caprisone'];	

$menu_input						= $_POST['menu'];


$email_input	= $_POST['email'];
$time_input		= $_POST['time'];
$place_input	= $_POST['place'];
$name_input		= $_POST['name'];

if(!empty($margot_input) || !empty($tribit_input ) || !empty($snickers_input) || !empty($kofila) || !empty($straznicke_bramburky_input) || !empty($cocacola_input) || !empty($menu_input)){
	if($time_input == "0" || $place_input == "0"){
		echo '<p class="error"> Vyplňte platné datum nebo místo doručení</p>';
	}else{

		require 'email/class.simple_mail.php';

			If($margot_input > "0"){
				$margot = '<p style="font-size: 13px; margin:13px 0px 0px 10px;">Margot.................... ' . $margot_input . ' ks </p><br />';
				$price = $price + $margot_input * $margot_price; //zde cena <<<<
			}

			If($tribit_input  > "0"){
				$tribit = '<p style="font-size: 13px; margin:13px 0px 0px 10px;">Tribit...................... ' . $tribit_input . ' ks </p><br />';
				$price = $price + $tribit_input * $tribit_price; //zde cena <<<<
			}

			If($snickers_input > "0"){
				$snickers = '<p style="font-size: 13px;  margin:13px 0px 0px 10px;">Snickers................. ' . $snickers_input . ' ks </p><br />';
				$price = $price + $snickers_input * $snickers_price; //zde cena <<<<
			}

			If($kofila_input	> "0"){
				$kofila = '<p style="font-size: 13px;  margin:13px 0px 0px 10px;">Kofila................. ' . $kofila_input . ' ks </p><br />';
				$price = $price + $kofila_input	 * $kofila_price; //zde cena <<<<
			}

			If($straznicke_bramburky_input 	> "0"){
				$straznicke_bramburky = '<p style="font-size: 13px;  margin:13px 0px 0px 10px;">Strážnické brambůrky............ ' . $straznicke_bramburky_input . ' ks </p><br />';
				$price = $price + $straznicke_bramburky_input * $straznicke_bramburky_price; //zde cena <<<<
			}

			If($cocacola_input	 	> "0"){
				$cocacola = '<p style="font-size: 13px;  margin:13px 0px 0px 10px;">Coca Cola............ ' . $cocacola_input	 . ' ks </p><br />';
				$price = $price + $cocacola_input	 * $cocacola_price ; //zde cena <<<<
			}

			If($menu_input	 	> "0"){
				$menu = '<p style="font-size: 13px;  margin:13px 0px 0px 10px;">Premium menu............ ' . $menu_input	 . ' ks </p><br />';
				$price = $price + $menu_input	 * $menu_price ; //zde cena <<<<
			}

			If($trancetto_input	 	> "0"){
				$trancetto = '<p style="font-size: 13px;  margin:13px 0px 0px 10px;">Trancetto............ ' . $trancetto_input	 . ' ks </p><br />';
				$price = $price + $trancetto_input	 * $trancetto_price ; //zde cena <<<<
			}

			If($caprisone_input	 	> "0"){
				$caprisone = '<p style="font-size: 13px;  margin:13px 0px 0px 10px;">Caprisone............ ' . $caprisone_input	 . ' ks </p><br />';
				$price = $price + $caprisone_input	 * $caprisone_price ; //zde cena <<<<
			}






			$name 		= 	'--- --- ---<br /><p style="font-size: 13px;  margin:13px 0px 0px 10px;">Jméno přijmení........ ' . $name_input . '</p><br />';
			$class 		= 	'--- --- ---<br /><p style="font-size: 13px;  margin:13px 0px 0px 10px;">Učebna................... ' . $place_input . '</p><br />';
			$time 		= 	'--- --- ---<br /><p style="font-size: 13px;  margin:13px 0px 0px 10px;">Čas........................ ' . $time_input . '</p><br />';
			$email 		= 	'--- --- ---<br /><p style="font-size: 13px;  margin:13px 0px 0px 10px;">Email..................... ' . $email_input . '</p><br />';

			$price_f 	= 	'---------------------------------------------------------------------------
							<p style="font-size: 13px;  margin:13px 0px 0px 70px;">Celková cena.................' . $price  . ' KČ</p><br />';

			$main_string = $margot.$tribit.$snickers.$kofila.$straznicke_bramburky.$cocacola.$menu.$trancetto.$caprisone;
			
			if ($name_input = "666") {
				$sender1 = 'durrer.jan+automattest@gmail.com';
				$sender2 = 'franta.falta+automattest@gmail.com';

			}else{
				$sender1 = 'durrer.jan+automat@gmail.com';
				$sender2 = 'franta.falta+automat@gmail.com';

			}

		$mail = SimpleMail::make()
		    ->setTo($sender1, 'AMBASSADOR')
		    ->setSubject("Objednávka č.". $order_number)
		    ->setFrom('sender@gmail.com', 'Automathys')
		    ->setReplyTo('reply@test.com', 'Mail Bot')
		    ->setCc(['AMBASSADOR' => $sender2])
		    ->addGenericHeader('X-Mailer', 'PHP/' . phpversion())
		    ->setHtml()
		    ->setMessage('<strong>Objednávka č. '.$order_number.'</strong> <br />
		    				<br />
		    				'.$main_string.$name.$class.$time.$email.$price_f)
		    ->setWrap(78);
		$send = $mail->send();

if(!empty($email_input	= $_POST['email'])){
		$mail_2 = SimpleMail::make()
		    ->setTo($email_input, 'Zákazník')
		    ->setSubject("Objednávka č.". $order_number)
		    ->setFrom('sender@gmail.com', 'Automathys')
		    ->addGenericHeader('X-Mailer', 'PHP/' . phpversion())
		    ->setHtml()
		    ->setMessage('<p style="font-size: 20px; display: initial;">Potvrzení objednávky č. '.$order_number.'</p> 
		    				<br />
		    				'.$main_string.$name.$class.$time.$email.$price_f.'
		    				 <br />
		    				 <strong>Děkujeme za Váš nákup<br />
		    				 Automathys
		    				 </strong>')
		    ->setWrap(78);
		$send_2 = $mail_2->send();
}
			if ($send) {
	    		echo '<p class="ok">Děkujeme Vám za Váš nákup</p><br>';
	    		Echo '<p class="hlaska1">Nákup Vám bude doručen ve Vámi zvolený čas</br> '.$time_input.' </p><br/>';
	    		echo '<p class="cena1">Cena '.$price.' kč</p>';
			} else {
	    		echo '<p class="error">Problém s potvrzením objednávky</p>';
			}
	}

}else{
	 echo '<p class="error">Vyberte nějaké zboží</p>';
}

?>


</div>


<br>
<div id="navrat">
	<a href="javascript:history.back();">Zpět do automatu</a>
</div>

</div>

<iframe class="add"><endora></iframe>
</body>
</html>