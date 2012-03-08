<?php
	session_start();
	$id=mysql_connect("localhost","root","root");
	$id_db=mysql_select_db("sondage");
	$num=$_SESSION['numero'];
	$visa=$_SESSION['visa'];
	$avis=$_SESSION['avis'];
	$request="INSERT INTO avis(numero,visa,avis) VALUES('$num','$visa','$avis')";
	if(!mysql_query($request)){
		mysql_query("UPDATE avis SET avis='$avis' WHERE numero='$num' AND visa='$visa' LIMIT 1");
	}
	mysql_close($id); 
	header('Location: accueil_spectateur.php');
?>