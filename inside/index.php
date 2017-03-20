<style type="text/css">
	.unimportant{
		font-size: 0.5em;
	}
	.important{
		font-size: 2em;
		margin-left: 20px;
	}
	.simportant{
		font-size: 3.5em;
	}
	#bottom{
		font-size: 3em;
		margin-left: 20px;
		margin-top: 20px;
	}
	a{
		margin-left: 20px;
		margin-right: 10px;
		font-size: 1.5em;
	}
	.link{
		margin-top: 30px;
	    padding-bottom: 14px;
	    list-style: none;
	}
	.done{
		text-decoration: line-through;
	}


</style>
<script type="text/javascript">
function done(e){
  e.target.classList.add("done");
}
</script>
<?php
$fail 	= 0;
$trzba 	= 0;
$done	= 0;

$json = json_decode(
	'{"file":'.file_get_contents("../produkty.json")."}", true
)['file'];

if($_GET['heslo'] == "kokot123"){


require '../connect.inc.php';
	if($_GET['date'] == dnes){
		$date = date("dmY");
		$sql = "SELECT * FROM Objednavky WHERE date_processing = '$date' ORDER BY storno, done ASC,time_delivery ASC,place ";
	}elseif ($_GET['date'] == zítra) {
		$dt = date('dmY', strtotime(' +1 day'));
		$sql = "SELECT * FROM Objednavky WHERE date_processing = '$dt' ORDER BY storno, done ASC,time_delivery ASC,place";
	}elseif (!empty($_GET['date'])) {
		$date = $_GET['date'];
		$sql = "SELECT * FROM Objednavky WHERE date_processing = '$date' ORDER BY time_delivery";
	}else{
		$sql = "SELECT * FROM Objednavky ORDER BY time_delivery" ;
	}

	$result =  $mysqli->query($sql);

	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
        	if ($row["spam"]==0) {
        		if($row["done"] == 1){$color="green";$done++;$trzba+=$row["price"];}elseif($row["done"] == 0 && $row["storno"] == 0){$color="red";$fail++;}
		    		if ($row["storno"] == 1){$color="grey";}
		    		if ($row["name"] == 666){$color="pink";}
					$puvodni_cena = "";
					echo '<ul style="background:'.$color.';">';
					echo '<li class=unimportant>Id: ' .$row["true_id"]."</li>";
					echo '<li class=unimportant>Unique key: ' .$row["unique_key"]."</li>";
					echo '<li class=unimportant>Č.P.O.: '. date("d.m.Y  \-- H:i:s", $row["true_id"])."</li>";

					IF(!empty($row['promo_code'])){
						echo '<li class=unimportant>Promo code: '. $row["promo_code"]."</li>";
						if($row['price_puvodni'] !=0)$puvodni_cena = "<s>".$row["price_puvodni"]." Kč</s> ";
					}

					echo "<li class=important>Čas:".date("d.m.Y \** H:i:s", $row["time_delivery"])."</li>";
					echo "<li class=important>Třída: ".$row["place"]."</li>";
					echo "<li class=important>Jméno: ".$row["name"]."</li>";
					echo "<li class=important>Cena: ".$puvodni_cena.$row["price"]." Kč</li>";
					IF(!empty($row['promo_code'])){
						echo "<li class=important> Promo kód: Přijat </li>";
						echo "<ul><li class=important> Hodnota: ". $row['promo_msg']."</li>";
							if($puvodni_cena != "")echo "<li class=important>Sleva na celý nákup: ". $row['promo_discount']." %</li>";
						echo "</ul>";

						}
			       	echo "<ul>";
			       	//zde parsovat json
       				foreach (explode(';',$row["product"]) as $product) {
        				echo "<li class=simportant onclick=done(event)>";

								list($product_id, $count) = explode("@",$product);
								list($product_id, $variant) = explode("/",$product_id);
								$product_number = array_search(
									$product_id,
									array_column($json, 'id')
								);
								$p = $json[$product_number];

								echo $p['jmeno'];
								if($variant) echo " ($variant)";
								elseif( isset($p['detail']) ) echo " ($p[detail])";
								echo ", $count kusů";

								echo "</li>";
        			}
        			//zde parsovat json
	       			echo "</ul>";
	        		echo '<li class="link">';
	        		echo '<a href="del.php?a=1&id='.$row["unique_key"].'">VYŘÍZENO</a><a href="del.php?a=0&id='.$row["unique_key"].'">NEVYŘÍZENO</a><a href="del.php?a=3&id='.$row["unique_key"].'">SPAM</a>';
	        		echo "</li>";
        			echo "</ul>";
        	}
    	}
    	echo "<p id=bottom> Tržba: ".$trzba." Kč</p>";
    	echo "<p id=bottom> Vyřízeno: ".$done."</p>";
    	echo "<p id=bottom> Nevyřízeno: ".$fail."</p>";
	} else {
    	echo "Žádná objednávka k tomto datu nenalezena";
    	echo $_GET['date'];
	}
	$mysqli->close();
}else{
	echo "Nedostatečné oprávnění";
}
?>

<iframe class=add style="display: none;"><endora></iframe>
