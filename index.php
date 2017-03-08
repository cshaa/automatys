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



<div class="product">             <!-- Produkt Margot -->


	<img src="cola_bramburky.jpg">

	<div class="popisek">Premium menu</div>

	<div class="cena">30 Kč</div>

	<div class="akce">   <!-- AKční panel -->
	Akce do 14. 3.
	</div>

	<p>Počet</p>

	<table class="pocet">
	<tr>
	<td class="plusminus"><input type="button" onclick="decreaseValue('cola_bramburky')" value="-" ></td>
	<td class="pocet_input"><input type="number" placeholder="Počet" placeholder="Počet" id="cola_bramburky" step="1"  name="menu" value="0" min="0" ></td>
	<td class="plusminus"><input type="button" onclick="increaseValue('cola_bramburky')" value="+" ></td>
	</tr>
	</table>

</div>

<div class="product">             <!-- Produkt Margot -->


	<img src="croissant.png">

	<div class="popisek">7Days Croissant double </div>


	<div class="cena">12 Kč</div>

	<div class="novinka">   <!-- Novinka panel -->
	Novinka
	</div>

<table class="varianta">
    <tr>
      <td class="volba">
        <label class="radio">
        <input type="radio" name="volba_croissant" value="Kakao - kokos" checked>
        <span class="outer"><span class="inner"></span></span>Kakao - kokos</label>
      </td>
      <td class="volba">
        <label class="radio">
        <input type="radio" name="volba_croissant" value="Vanilka - višeň">
        <span class="outer"><span class="inner"></span></span>Vanilka -višeň</label>
      </td>
    </tr>
  </table>
	<p>Počet</p>

	<table class="pocet">
	<tr>
	<td class="plusminus"><input type="button" onclick="decreaseValue('croissant')" value="-" ></td>
	<td class="pocet_input"><input type="number" placeholder="Počet" placeholder="Počet" id="croissant" step="1"  name="croissant" value="0" min="0" ></td>
	<td class="plusminus"><input type="button" onclick="increaseValue('croissant')" value="+" ></td>
	</tr>
	</table>

</div>

<div class="product">             <!-- Produkt Trancetto -->
	<img src="trancetto.jpg">

	<div class="popisek">Trancetto 28g</div>

	<div class="cena"> 10 Kč</div>
	<div class="akce">   <!-- AKční panel -->
	Sleva 10% 
	</div>
	<p>Počet</p>

	<table class="pocet">
	<tr>
	<td class="plusminus"><input type="button" onclick="decreaseValue('trancetto')" value="-" class="pocet"></td>
	<td class="pocet_input"><input type="number" placeholder="Počet" placeholder="Počet" id="trancetto" step="1"  name="trancetto" value="0" min="0" class="pocet"></td>
	<td class="plusminus"><input type="button" onclick="increaseValue('trancetto')" value="+" class="pocet"></td>
	</tr>
	</table>
</div>


<div class="product">             <!-- Produkt Margot -->


	<img src="margot.jpg">

	<div class="popisek">Margot 100g</div>

	<div class="cena">15 Kč</div>

	<div class="akce">   <!-- AKční panel -->
	Akční nabídka
	</div>

	<p>Počet</p>

	<table class="pocet">
	<tr>
	<td class="plusminus"><input type="button" onclick="decreaseValue('margot')" value="-" ></td>
	<td class="pocet_input"><input type="number" placeholder="Počet" placeholder="Počet" id="margot" step="1"  name="margot" value="0" min="0" ></td>
	<td class="plusminus"><input type="button" onclick="increaseValue('margot')" value="+" ></td>
	</tr>
	</table>

</div>

<div class="product">             <!-- Produkt Tribit -->
	<img src="tribit.jpg">

	<div class="popisek">Tribit 46g</div>

	<div class="cena">15 Kč</div>

	<p>Počet</p>

	<table class="pocet">
	<tr>
	<td class="plusminus"><input type="button" onclick="decreaseValue('tribit')" value="-" class="pocet"></td>
	<td class="pocet_input"><input type="number" placeholder="Počet" placeholder="Počet" id="tribit" step="1"  name="tribit" value="0" min="0" class="pocet"></td>
	<td class="plusminus"><input type="button" onclick="increaseValue('tribit')" value="+" class="pocet"></td>
	</tr>
	</table>
</div>


<div class="product">             <!-- Produkt Coca-cola -->


	<img src="cocacola.jpg">

	<div class="popisek">Coca-cola 0,33l</div>

	<div class="cena">18 Kč</div>

	<div class="akce">   <!-- AKční panel -->
	Akční nabídka
	</div>

	<p>Počet</p>

	<table class="pocet">
	<tr>
	<td class="plusminus"><input type="button" onclick="decreaseValue('cocacola')" value="-" ></td>
	<td class="pocet_input"><input type="number" placeholder="Počet" placeholder="Počet" id="cocacola" step="1"  name="cocacola" value="0" min="0" ></td>
	<td class="plusminus"><input type="button" onclick="increaseValue('cocacola')" value="+" ></td>
	</tr>
	</table>


</div>


<div class="product">             <!-- Produkt Kofila -->
	<img src="kofila.jpg">

	<div class="popisek">Kofila 45g</div>

	<div class="cena">14 Kč</div>

	<p>Počet</p>

	<table class="pocet">
	<tr>
	<td class="plusminus"><input type="button" onclick="decreaseValue('kofila')" value="-" class="pocet"></td>
	<td class="pocet_input"><input type="number" placeholder="Počet" placeholder="Počet" id="kofila" step="1"  name="kofila" value="0" min="0" class="pocet"></td>
	<td class="plusminus"><input type="button" onclick="increaseValue('kofila')" value="+" class="pocet"></td>
	</tr>
	</table>
</div>


<div class="product">             <!-- Produkt Snickers -->
	<img src="snickers.jpg">

	<div class="popisek">Snickers 50g</div>

	<div class="cena">16 Kč</div>

	<p>Počet</p>

	<table class="pocet">
	<tr>
	<td class="plusminus"><input type="button" onclick="decreaseValue('snickers')" value="-" class="pocet">
	<td class="pocet_input"><input type="number" placeholder="Počet" placeholder="Počet" id="snickers" step="1"  name="snickers" value="0" min="0" class="pocet">
	<td class="plusminus"><input type="button" onclick="increaseValue('snickers')" value="+" class="pocet">
	</tr>
	</table>

</div>


<div class="product">             <!-- Produkt Strážnické brambůrky -->
	<img src="straznicke_bramburky.jpg">

	<div class="popisek">Strážnické brambůrky 60g</div>

	<div class="cena">18 Kč</div>

	<p>Počet</p>

	<table class="pocet">
	<tr>
	<td class="plusminus"><input type="button" onclick="decreaseValue('straznicke_bramburky')" value="-" class="pocet"></td>
	<td class="pocet_input"><input type="number" placeholder="Počet" placeholder="Počet" id="straznicke_bramburky" step="1"  name="straznicke_bramburky" value="0" min="0" class="pocet"></td>
	<td class="plusminus"><input type="button" onclick="increaseValue('straznicke_bramburky')" value="+" class="pocet"></td>
	</tr>
	</table>
</div>

<div class="product">             <!-- Produkt Capri-sonne -->
	<img src="caprisone.png">

	<div class="popisek">Capri-Sonne 0,2l</div>

	<div class="cena">15 Kč</div>

	<table class="varianta">
    <tr>
      <td class="volba">
        <label class="radio">
        <input type="radio" name="volba_capri" value="pomeranč" checked>
        <span class="outer"><span class="inner"></span></span>Pomeranč</label>
      </td>
      <td class="volba">
        <label class="radio">
        <input type="radio" name="volba_capri" value="Multivitamín">
        <span class="outer"><span class="inner"></span></span>Multivitamín</label>
      </td>
    </tr>
  </table>

	<p>Počet</p>
  <table class="pocet">
  	<tr>
    	<td class="plusminus"><input type="button" onclick="decreaseValue('caprisone')" value="-" class="pocet"></td>
    	<td class="pocet_input"><input type="number" placeholder="Počet" placeholder="Počet" id="caprisone" step="1"  name="caprisone" value="0" min="0" class="pocet"></td>
    	<td class="plusminus"><input type="button" onclick="increaseValue('caprisone')" value="+" class="pocet"></td>
  	</tr>
	</table>
</div>


<br>

<input type="text" placeholder="Jméno" name="name" required><br />
<input type="email" placeholder="Email" name="email"></p>
<p class="doruceni">* Nepovinný údaj</p>
<select name="time">

	<option value="0">--- Čas přestávky ---</option>

	<!-- 8:45 - 8:55 -->
	<option
		<?php
			If(date("H") == 8  && date("i") > 53 || date("H") > 8 && date("H") < 14){
			echo 'value="8:45  - 8:55" disabled>8:45  - 8:55 *';
			}elseif (date("H") >= 14) {
			$day 	= date("d") + 1;
			$month 	= date("n");
			$year 	= date("Y");
			$tom 	= ' / Zítra '. $day.'.'.$month.'.'.$year;
			echo 'value="8:45 - 8:55 - Zítra '.$day.'.'.$month.'">8:45 - 8:55'.$tom;
			}else{
			echo 'value="8:45 - 8:55">8:45  - 8:55 - Dnes';
			}
		?>
	</option>

	<!-- 9:40 - 10:00 -->
	<option
		<?php
			If(date("H") == 9  && date("i") > 58 || date("H") > 9 && date("H") < 14){
			echo 'value="9:40  - 10:00" disabled>9:40  - 10:00 *';

			}elseif (date("H") >= 14) {
			$day 	= date("d") + 1;
			$month 	= date("n");
			$year 	= date("Y");
			$tom 	= ' / Zítra '. $day.'.'.$month.'.'.$year;
			echo 'value="9:40 - 10:00 - Zítra '.$day.'.'.$month.'">9:40 - 10:00'.$tom;
			}else{
			echo 'value="9:40 - 10:00">9:40 - 10:00 - Dnes';
			}
		?>
	</option>

	<!-- 10:45 - 10:55 -->
	<option
		<?php
			If(date("H") == 10  && date("i") > 56 || date("H") > 10 && date("H") < 14){
			echo 'value="10:45 - 10:55" disabled>10:45 - 10:55 *';
			}elseif (date("H") >= 14) {
			$day 	= date("d") + 1;
			$month 	= date("n");
			$year 	= date("Y");
			$tom 	= ' / Zítra '. $day.'.'.$month.'.'.$year;
			echo 'value="10:45 - 10:55 - Zítra '.$day.'.'.$month.'">10:45 - 10:55'.$tom;
			}else{
			echo 'value="10:45 - 10:55">10:45 - 10:55 - Dnes';
			}
		?>
	</option>

	<!-- 11:40 - 11:50 -->
	<option
		<?php
			If(date("H") == 11  && date("i") > 56 || date("H") > 11 && date("H") < 14){
			echo 'value="11:40 - 11:50" disabled>11:40 - 11:50 *';
			}elseif (date("H") >= 14) {
			$day 	= date("d") + 1;
			$month 	= date("n");
			$year 	= date("Y");
			$tom 	= ' / Zítra '. $day.'.'.$month.'.'.$year;
			echo 'value="11:40 - 11:50 - Zítra '.$day.'.'.$month.'">11:40 - 11:50'.$tom;
			}else{
			echo 'value="11:40 - 11:50">11:40 - 11:50 - Dnes';
			}
		?>
	</option>

	<!-- 12:35 - 12:40 -->
	<option
		<?php
			If(date("H") == 12  && date("i") > 39 || date("H") > 12 && date("H") < 14){
			echo 'value="12:35 - 12:40" disabled>12:35 - 12:40 *';

			}elseif (date("H") >= 14) {
			$day 	= date("d") + 1;
			$month 	= date("n");
			$year 	= date("Y");
			$tom 	= ' / Zítra '. $day.'.'.$month.'.'.$year;
			echo 'value="12:35 - 12:40 - Zítra '.$day.'.'.$month.'">12:35 - 12:40'.$tom;
			}else{
			echo 'value="12:35 - 12:40">12:35 - 12:40 - Dnes';
			}
		?>
	</option>

	<!-- 13:25 - 13:30 -->
	<option
		<?php
			If(date("H") == 13  && date("i") > 29 || date("H") > 13 && date("H") < 14){
			echo 'value="13:25 - 13:30" disabled>13:25 - 13:30 *';

			}elseif (date("H") >= 14) {
			$day 	= date("d") + 1;
			$month 	= date("n");
			$year 	= date("Y");
			$tom 	= ' / Zítra '. $day.'.'.$month.'.'.$year;
			echo 'value="13:25 - 13:30 - Zítra '.$day.'.'.$month.'">13:25 - 13:30'.$tom;
			}else{
			echo 'value="13:25 - 13:30">13:25 - 13:30 - Dnes';
			}
		?>
	</option>
</select>

<p class="doruceni">* Po 14:00 přijímáme objednávky na druhý den</p>

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
