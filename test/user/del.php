<?php
require '../connect.inc.php';
$unique_key = $_GET['id'];
$a = $_GET['a'];
if ($a==1) {
	$sql = "UPDATE Objednavky SET storno=1 WHERE unique_key='$unique_key'";
}
If( $mysqli->query($sql) === TRUE){
	echo '<script type="text/javascript">location.replace("./?id='.$unique_key.'");</script>';
}else{
	echo 'Nastal nějaký problémek, napište nám prosím...';	
}
echo $mysqli->error;
$mysqli->close();


?>