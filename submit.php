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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-93298002-1', 'auto');
  ga('send', 'pageview');

</script>

<div id="hlaska">

<?php
$order_number = time();

$margot_price 				= 15;
$tribit_price 				= 15;
$snickers_price 			= 16;
$kofila_price 				= 14;
$straznicke_bramburky_price = 16;
$cocacola_price 			= 18;
$trancetto_price			= 8;
$caprisone_price			= 15;
$menu_price					= 30;
$croissant_price			= 12;


$opice_price				= 28;
$banan_price				= 6;
$sprite_price				= 16;
$delissa_price				= 6;

$margot_input 					= $_POST['margot'];
$tribit_input 					= $_POST['tribit'];
$snickers_input					= $_POST['snickers'];

$kofila_input					= $_POST['kofila'];
$straznicke_bramburky_input 	= $_POST['straznicke_bramburky'];
$cocacola_input					= $_POST['cocacola'];

$trancetto_input				= $_POST['trancetto'];	
$caprisone_input				= $_POST['caprisone'];	

$opice_input					= $_POST['opice'];	
$banan_input					= $_POST['banan'];	
$sprite_input					= $_POST['sprite'];	
$delissa_input					= $_POST['delissa'];	

$volba_menu						= $_POST['volba_menu'];





$menu_input						= $_POST['menu'];

$volba_capri 					= $_POST['volba_capri'];

$croissant_input				= $_POST['croissant'];
$volba_croissant				= $_POST['volba_croissant'];
$volba_straznicke				= $_POST['volba_straznicke'];


$email_input	= $_POST['email'];
$time_input		= $_POST['time'];
$place_input	= $_POST['place'];
$name_input		= $_POST['name'];

if(!empty($margot_input) || !empty($tribit_input) || !empty($snickers_input) || !empty($kofila_input) || !empty($straznicke_bramburky_input) || !empty($cocacola_input) || !empty($menu_input) || !empty($trancetto_input) || !empty($caprisone_input) || !empty($croissant_input ) || !empty($opice_input) || !empty($banan_input) || !empty($sprite_input) || !empty($delissa_input)){

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
				$straznicke_bramburky = '<p style="font-size: 13px;  margin:13px 0px 0px 10px;">Strážnické brambůrky / '. $volba_straznicke .'............ ' . $straznicke_bramburky_input . ' ks </p><br />';
				$price = $price + $straznicke_bramburky_input * $straznicke_bramburky_price; //zde cena <<<<
			}

			If($cocacola_input	 	> "0"){
				$cocacola = '<p style="font-size: 13px;  margin:13px 0px 0px 10px;">Coca Cola............ ' . $cocacola_input	 . ' ks </p><br />';
				$price = $price + $cocacola_input	 * $cocacola_price ; //zde cena <<<<
			}

			If($menu_input	 	> "0"){
				$menu = '<p style="font-size: 13px;  margin:13px 0px 0px 10px;">Premium menu / '.$volba_menu.'............' . $menu_input	 . ' ks </p><br />';
				$price = $price + $menu_input	 * $menu_price ; //zde cena <<<<
			}

			If($trancetto_input	 	> "0"){
				$trancetto = '<p style="font-size: 13px;  margin:13px 0px 0px 10px;">Trancetto............ ' . $trancetto_input	 . ' ks </p><br />';
				$price = $price + $trancetto_input	 * $trancetto_price ; //zde cena <<<<
			}

			If($caprisone_input	 	> "0"){
				$caprisone = '<p style="font-size: 13px;  margin:13px 0px 0px 10px;">Caprisone / '.$volba_capri .' ............ ' . $caprisone_input	 . ' ks </p><br />';
				$price = $price + $caprisone_input	 * $caprisone_price ; //zde cena <<<<
			}


			If($croissant_input	 	> "0"){
				$croissant = '<p style="font-size: 13px;  margin:13px 0px 0px 10px;">Croissant / '.$volba_croissant .' ............ ' . $croissant_input	 . ' ks </p><br />';
				$price = $price + $croissant_input	 * $croissant_price ; //zde cena <<<<
			}






			If($opice_input	 	> "0"){
				$opice = '<p style="font-size: 13px;  margin:13px 0px 0px 10px;">Opice............ ' . $opice_input . ' ks </p><br />';
				$price = $price + $opice_input	 * $opice_price ; //zde cena <<<<
			}


			If($banan_input	 	> "0"){
				$banan = '<p style="font-size: 13px;  margin:13px 0px 0px 10px;">Banán............ ' . $banan_input . ' ks </p><br />';
				$price = $price + $banan_input		 * $banan_price	 ; //zde cena <<<<
			}

			If($sprite_input	 	> "0"){
				$sprite = '<p style="font-size: 13px;  margin:13px 0px 0px 10px;">Sprite............ ' . $sprite_input	 . ' ks </p><br />';
				$price = $price + $sprite_input		 * $sprite_price	 ; //zde cena <<<<
			}

			If($delissa_input	 	> "0"){
				$delissa = '<p style="font-size: 13px;  margin:13px 0px 0px 10px;">Delissa............ ' . $delissa_input	 . ' ks </p><br />';
				$price = $price + $delissa_input	 * $delissa_price ; //zde cena <<<<
			}


			$name 		= 	'--- --- ---<br /><p style="font-size: 13px;  margin:13px 0px 0px 10px;">Jméno přijmení........ ' . $name_input . '</p><br />';
			$class 		= 	'--- --- ---<br /><p style="font-size: 13px;  margin:13px 0px 0px 10px;">Učebna................... ' . $place_input . '</p><br />';
			$time 		= 	'--- --- ---<br /><p style="font-size: 13px;  margin:13px 0px 0px 10px;">Čas........................ ' . $time_input . '</p><br />';
			$email 		= 	'--- --- ---<br /><p style="font-size: 13px;  margin:13px 0px 0px 10px;">Email..................... ' . $email_input . '</p><br />';

			$price_f 	= 	'---------------------------------------------------------------------------
							<p style="font-size: 13px;  margin:13px 0px 0px 70px;">Celková cena.................' . $price  . ' Kč</p><br />';

			$main_string = $margot.$tribit.$snickers.$kofila.$straznicke_bramburky.$cocacola.$menu.$trancetto.$caprisone.$croissant.$opice.$banan.$sprite.$delissa ;
			
			if ($name_input == "666") {
				$sender1 = 'durrer.jan+automattest@gmail.com';
				$sender2 = 'franta.falta+automattest@gmail.com';
				$sender3 = 'danovdk88+automattest@gmail.com';
				$sender4 = 'michal+automattest@grno.cz';

			}else{
				$sender1 = 'durrer.jan+automat@gmail.com';
				$sender2 = 'franta.falta+automat@gmail.com';
				$sender3 = 'danovdk88+automat@gmail.com';
				$sender4 = 'michal+automat@grno.cz';

			}

		$mail = SimpleMail::make()
		    ->setTo($sender1, 'AMBASSADOR')
		    ->setSubject("Objednávka č.". $order_number)
		    ->setFrom('sender@gmail.com', 'Automathys')
		    ->setReplyTo('reply@test.com', 'Mail Bot')
		    ->setCc(['AMBASSADOR1' => $sender2, 'AMBASSADOR2' => $sender3, 'AMBASSADOR3' => $sender4])
		    ->addGenericHeader('X-Mailer', 'PHP/' . phpversion())
		    ->setHtml()
		    ->setMessage('<strong>Objednávka č. '.$order_number.'</strong> <br />
		    				<br />
		    				'.$main_string.$name.$class.$time.$email.$price_f)
		    ->setWrap(78);
		$send = $mail->send();


			if ($send) {
	    		echo '<script type="text/javascript">location.replace("thanks.php?t='.$time_input.'&err='.$err.'&p='.$price.'");</script>';

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