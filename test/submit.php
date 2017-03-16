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

// Načti naše produkty z jsonu
$produkty = json_decode(
	'{"file":'.file_get_contents("produkty.json")."}", true
)["file"];

$objednavka = time();
$unique_id = bin2hex(random_bytes(16));
$text = "<strong>Objednávka č. $objednavka</strong><br /><br />";
$cena = 0;

$student   = $_POST['name'];
$email     = $_POST['email'];
$timestamp = $_POST['time'];
$misto     = $_POST['place'];

// Nejdřív zformátuj čas
$cas = date("G:i / j. n. Y",$timestamp);

// Tahle věc přijde uložit do DB
$query = [];



/*
	Usnadňuje formátování mailu
*/
$hr = str_repeat('-',30).'<br />';

function napis_radek($a,$b){
	$text = '<p style="font-size: 13px; font-family: monospace; margin:13px 0px 0px 10px;">';
	$text .= str_pad( $a, 50-strlen( $b ), ".");
	$text .= $b.'</p><br />';
	return $text;
}



/*
	Projeď všechny naše produkty a ty z nich,
	které jsou objednané započítej.
*/
foreach( $produkty as $p ){
	$id = $p['id'];
	$pocet = +$_POST[$id];

	// Pokud si uživatel objednal aspoň 1x
	if( $pocet > 0){
		$jmeno = $p['jmeno'];
		$qid = $id;

		// Existuje volba?
		if( isset($_POST['volba_'.$id]) ){
			$volba = $_POST['volba_'.$id];
			$jmeno .= " ($volba)";
			$qid   .= "/$volba";
		}

		$text .= napis_radek( $jmeno,  $pocet.' ks' );
		$cena += $pocet * $p['cena'];
		$query[] = $qid."@".$pocet;
	}

}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ↓
If(isset($_POST['promokod']) && !empty($_POST['promokod'])){
	$promo = $_POST['promokod'];
	require 'connect.inc.php';
	$sql_1 = "SELECT * FROM Promo_codes WHERE unique_key = '$promo'";
	$result =  $mysqli->query($sql_1);
	If($result->num_rows != 1){
		$promokod_validity = "InValid";
	}elseif ($result->num_rows == 1) {
		while($row = $result->fetch_assoc()) {
			if ($row['validity'] == 0) {
				$promokod_validity = "Used";
			}else{
				$promokod_validity = "Valid";

				$promo_msg 		= $row['text'];
				If($row['discount'] > 0){
					$promokod_validity = "Valid_discount";
					$price_puvodni = $cena;
					$cena = $cena - (($cena/100)*$row['discount']);
					$promo_msg = $promo_msg." (". "Sleva ". $row['discount']." %)";

					$sql_00 = "UPDATE Promo_codes SET validity=0 WHERE unique_key='$promo'";
					$mysqli->query($sql_00);
				}		
			}
		}
	}
}else{
	$promo_msg = "NE";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ↑



/*
	Pokud nebylo vybráno žádné zboží, třída nebo čas.
*/
if( $cena == 0 )
	echo '<p class="error">Vyberte nějaké zboží</p>';

elseif( $timestamp == "0" || $misto == "0" )

	echo '<p class="error">Vyplňte platné datum a místo doručení</p>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ↓
elseif($promokod_validity == "InValid")
	echo '<p class="error">Neexistující promo kód</p>';

elseif($promokod_validity == "Used")
	echo '<p class="error">Již použitý promo kód</p>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ↑
/*
	Všechno v cajku, objednej!
*/
else{

	require '../email/class.simple_mail.php';

	$text .= $hr;
	$text .= napis_radek('Jméno a přijmení',$student);
	$text .= napis_radek('Email',           $email  );
	$text .= napis_radek('Učebna',          $misto  );
	$text .= napis_radek('Čas',             $cas    );
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ↓
	$text .= napis_radek('Promo kód',    	$promo_msg);
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ↑
	$text .= $hr;
	$text .= napis_radek('Celková cena',    $cena   );

	if ($student == "666") {
		$machine = 'Test';
		$from = 'bigymat+test@email.cz';
		$sender1 = 'durrer.jan+automattest@gmail.com';
		$sender2 = 'franta.falta+automattest@gmail.com';
		$sender3 = 'danovdk88+automattest@gmail.com';
		$sender4 = 'michal+automattest@grno.cz';

	} else {
		$machine = 'Bigymat';
		$from = 'bigymat@email.cz';
		$sender1 = 'durrer.jan+automat@gmail.com';
		$sender2 = 'franta.falta+automat@gmail.com';
		$sender3 = 'danovdk88+automat@gmail.com';
		$sender4 = 'michal+automat@grno.cz';
	}

	$mail = SimpleMail::make()
		    ->setTo($sender1, 'AMBASSADOR')
		    ->setSubject("Objednávka č.". $objednavka)
		    ->setFrom($from, $machine)
		    ->setReplyTo('bigymat@email.cz', 'Bigymat')
		    ->setCc(['AMBASSADOR1' => $sender2, 'AMBASSADOR2' => $sender3, 'AMBASSADOR3' => $sender4])
		    ->addGenericHeader('X-Mailer', 'PHP/' . phpversion())
		    ->setHtml()
		    ->setMessage($text)
		    ->setWrap(78);

		$send = $mail->send();


		if ($send) {
    		echo "<script type='text/javascript'>location.replace('user/?id=$unique_id');</script>";


				// Zde je Honzův kód
				$query = join(";",$query);
				$date_processing = date("dmY",$timestamp);
				/*
					Teď je $query ve formátu:
					id1@pocet1;id2/varianta@pocet2
				*/

				require'connect.inc.php';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ↓
				$sql = "INSERT INTO Objednavky (
					true_id, unique_key, date_processing, name, email, product,
					time_delivery, place,price_puvodni, price,promo_code,promo_msg, done, storno, spam)
					VALUES ('$objednavka', '$unique_id', '$date_processing',
						'$student', '$email','$query','$timestamp','$misto ','$price_puvodni',
						'$cena','$promo','$promo_msg',FALSE,FALSE,FALSE)";
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ↑
				if(mysqli_query($mysqli, $sql)){

				    echo "Records inserted successfully.";

				} else{

				    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

				}

				echo mysqli_error ( $mysqli );

				// Close connection

				mysqli_close($link);



		} else {
    		echo '<p class="error">Problém s potvrzením objednávky</p>';
		}

	}


?>

</div>


<br>
<div id="navrat">
	<a href="javascript:history.back();">Zpět do automatu</a>
</div>

</div>

<iframe class="ad"><endora></iframe>
</body>
</html>
