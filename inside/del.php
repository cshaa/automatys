<?php
require '../connect.inc.php';
$unique_key = $_GET['id'];
$a = $_GET['a'];
if ($a==1) {
	$sql = "UPDATE Objednavky SET done=1 WHERE unique_key='$unique_key'";
}elseif ($a==0){
	$sql = "UPDATE Objednavky SET done=0 WHERE unique_key='$unique_key'";
}elseif ($a==3) {
	$sql = "UPDATE Objednavky SET spam=1 WHERE unique_key='$unique_key'";
}
If( $mysqli->query($sql) === TRUE){
	echo '<script type="text/javascript">location.replace("index.php?heslo=kokot123&date=dnes");</script>';
}else{
	echo 'Nějaký problémek';	
}
echo $mysqli->error;
$mysqli->close();


?>