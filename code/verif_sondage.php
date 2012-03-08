<?php
	session_start();
	$id=mysql_connect("localhost","root","root");
	$id_db=mysql_select_db("sondage");
	$nomfilm=$_POST['nomfilm'];
	$request="SELECT * FROM films WHERE titre='$nomfilm'";
	$result=mysql_query($request);
	while($ligne=mysql_fetch_array($result)){
		$visa=$ligne[0];
	}
	$_SESSION['visa']=$visa;
	$_SESSION['nomfilm']=$_POST['nomfilm'];
	$_SESSION['avis']=$_POST['avis'];
	mysql_close($id);
	header('Location: recapitulatif_sondage.php');
?>