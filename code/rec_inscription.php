<?php
	session_start();
	$id=mysql_connect("localhost","root","root");
	$id_db=mysql_select_db("sondage");
	$nom=$_SESSION['nom'];
	$prenom=$_SESSION['prenom'];
	$login=$_SESSION['login'];
	$mdp=$_SESSION['mdp'];
	$adresse=$_SESSION['adresse'];
	$tel=$_SESSION['tel'];
	$annee=$_SESSION['annee'];
	$mois=$_SESSION['mois'];
	$jour=$_SESSION['jour'];
	$CSP=$_SESSION['CSP'];
	$request = "INSERT INTO spectateurs(nom,prenom,login,mdp,adresse,telephone,date_naissance,csp) VALUES('$nom','$prenom','$login','$mdp','$adresse','$tel',STR_TO_DATE('$annee-$mois-$jour','%Y-%m-%d'),'$CSP')";
	mysql_query($request);
	mysql_close($id);
	$_SESSION=array();
	session_destroy();
	header('Location: main.php');
?>