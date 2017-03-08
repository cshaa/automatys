<!DOCTYPE html>
<html>
<head>

<link rel="apple-touch-icon" sizes="57x57" href="../favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="../favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="../favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="../favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="../favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="../favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="../favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="../favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="../favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="../favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
<link rel="manifest" href="../favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="../favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

	<link rel="stylesheet" type="text/css" href="../style.css">
	<link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
	<title>AUTOMAT</title>
</head>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-93298002-1', 'auto');
  ga('send', 'pageview');

</script>
<body>
<div id="container">
<header>
	AUTOMAT
</header>

<div id="hlaska">

<?php
	If(!empty($_POST['name'])){
		require '../email/class.simple_mail.php';
		$time = time();

				$sender1 = 'durrer.jan+feedback@gmail.com';
				$sender2 = 'franta.falta+feedback@gmail.com';
				$sender3 = 'danovdk88+feedback@gmail.com';
				$sender4 = 'michal+feedback@grno.cz';


			

		$mail = SimpleMail::make()
		    ->setTo($sender1, 'AMBASSADOR')
		    ->setSubject("Zpětná vazba č.". $time)
		    ->setFrom('sender@gmail.com', 'Automathys')
		    ->setReplyTo('reply@test.com', 'Mail Bot')
		    ->setCc(['AMBASSADOR1' => $sender2, 'AMBASSADOR2' => $sender3])
		    ->addGenericHeader('X-Mailer', 'PHP/' . phpversion())
		    ->setHtml()
		    ->setMessage('<strong>Zpětná vazba č. '.$time.'</strong> <br />
		    				<br />
		    				'.$_POST['name'].'<br>'.
		    				$_POST['lastname'].'<br>'.
		    				$_POST['email'].'<br><br><br>'.
		    				$_POST['feedback'].'<br>')
		    ->setWrap(78);
		$send = $mail->send();


			if ($send) {
	    		echo '<p class="ok">Děkujeme Vám za Vaši zpětnou vazbu.</p><br><br>';
	    		
			} else {
	    		echo '<p class="error">Problém s odesláním zpětné vazby.</p>';
			}
	}else{

echo '<p class="error">Vyplňte všechna pole</p>';		
	}





?>

<div id="navrat">
	<a href="/">Zpět do automatu</a>
</div>
</div>


<br>

</div>

<iframe class="add"><endora></iframe>
</body>
</html>