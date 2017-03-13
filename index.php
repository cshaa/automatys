<!DOCTYPE html>
<html>
<head>

<meta charset=utf-8 />

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

<script type="text/javascript">
function increaseValue(a)
{
    var value = parseInt(document.getElementById(a).value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById(a).value = value;
}

function decreaseValue(a)
{
    var value = parseInt(document.getElementById(a).value, 10);
    value = isNaN(value) ? 0 : value;
    value--;
    if(value < 0){
    	value = 0;
    }
    document.getElementById(a).value = value;
}
</script>
</head>
<body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-93298002-1', 'auto');
  ga('send', 'pageview');

</script>



<form action="submit.php" method="post">
<div id="container">

<header>
AUTOMAT
</header>

<div class="notification">
Prodloužili jsme pro Vás otvírací dobu!
</div>


<?php
// Zde je Michalův magický kód
include "produkty.php";
?>



<br>

<input type="text" placeholder="Jméno" name="name" required><br />
<input type="email" placeholder="Email" name="email"></p>
<p class="doruceni">* Nepovinný údaj</p>

<?php include "prestavky.php"; ?>
<p class="doruceni">* Po uzavírce přijímáme objednávky na druhý den</p>

<select name="place">
	<option value="0">--- Místo doručení ---</option>
	<option value="103">103</option>
	<option value="104">104</option>
	<option value="107">107</option>
	<option value="108">108</option>
	<option value="112">112</option>
	<option value="113">113</option>
	<option value="115">115</option>
	<option value="205">205</option>
	<option value="206">206</option>
	<option value="207">207</option>
	<option value="208">208</option>
	<option value="210">210</option>
	<option value="212">212</option>
	<option value="213">213</option>
	<option value="216">216</option>
	<option value="217">217</option>
	<option value="303">303</option>
	<option value="304">304</option>
	<option value="305">305</option>
	<option value="306">306</option>
	<option value="310">310</option>
	<option value="311">311</option>
	<option value="312">312</option>
	<option value="313">313</option>
	<option value="314">314</option>
	<option value="315">315</option>
	<option value="Aula">Aula</option>
	<option value="Knihovna">Knihovna</option>
</select>



<p><input id="zakoupit" type="submit" value="Zakoupit"></p>


</form>

<a href="feedback"><p class="feedback">Nenašli jste co jste hledali? Napište nám...</p></a>



</div>

<iframe class=add><endora></iframe>

</body>
</html>
