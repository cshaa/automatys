<?php
If($_GET['heslo'] == "kokot123"){

}else{
	echo '<script type="text/javascript">location.replace("Nedostatečné oprávnění");</script>';
}
?>
<style type="text/css">
textarea {
    width: 300px;
    height: 150px;
    padding: 2px 4px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    resize: none;
    margin-bottom: 5px;
}
input[type=text],input[type=number]{
	width: 300px;
	margin-bottom: 5px;
}
#code{
	background-color: lightgrey;
}
p {
	color: grey;
}
</style>
<?php
function randomString($length = 5) {
	$str = "";
	$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
	$max = count($characters) - 1;
	for ($i = 0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
	}
	return $str;
}

$random_string = randomString();
?>
<form action="##" method="post">
<input type="text" id="code" name="code" value="<?=randomString()?>" readonly="readonly"/><br />
<textarea name="msg"></textarea><br />
<input type="number" placeholder="% sleva na celý nákup" name="prcenta"><br/>
<input type="submit" name="" value="Uložit promo kód">
</form>

<?php

If(isset($_POST['msg']) && !empty($_POST['msg'] || $_POST['prcenta']) && !empty($_POST['prcenta'])){
	require '../connect.inc.php';
	$unique_key = $_POST['code'];
	$text 		= $_POST['msg'];
	$discount	= $_POST['prcenta'];
	$sql_1 = "SELECT * FROM Promo_codes WHERE unique_key = '$unique_key'";
	$result =  $mysqli->query($sql_1);
		if ($result->num_rows == 0) {
			$sql_2 = "INSERT INTO Promo_codes (unique_key, text, discount) VALUES ('$unique_key', '$text', '$discount')";
			if(mysqli_query($mysqli, $sql_2)){
				echo "<p>Váš promo kód ".$unique_key. " úspěšně přidán</p><br />";
				echo "<p>".$_POST['msg']."</p>";
			} else{
				echo "ERROR: Could not able to execute $sql.";
			}
		  mysqli_close($mysqli);
	}else{
		echo "Již existující promo kód ".$_POST['code'];
	}

}
?>


<iframe class=add style="display: none;"><endora></iframe>