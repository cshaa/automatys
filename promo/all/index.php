<style type="text/css">
	td{
		width: 15%;
		border-left: 1px solid black;
	}
	p{
		position: relative;
		margin-left: 10px
	}
	table{
    	width: 100%;
	}
</style>
<?php
If($_GET['heslo'] == "kokot123"){
	require '../../connect.inc.php';
	$sql = "SELECT * FROM Promo_codes ORDER BY validity DESC";
	$result =  $mysqli->query($sql);
		while($row = $result->fetch_assoc()) {
			$color = "";
			if($row['validity'] == 1){
				$color = "green";
			}
			else {
				$color = "red";
			}
			echo "<table>";
			echo '<tr><td><p style="color:'.$color.'">'.$row['id']."</p></td><td><p>".$row['unique_key']."</p></td><td><p>".$row['text']."</p></td><td><p> Sleva ".$row['discount']." % na celý nákup</p></td><td><p>".$row['validity']."</p></td></tr>";
			echo "</table>";
 }
}else{
	echo 'Nedostatečné oprávnění';

}
?>
<iframe class=add style="display: none;"><endora></iframe>