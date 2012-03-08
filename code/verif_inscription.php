<?php
	session_start();
	$id=mysql_connect("localhost","root","root");
	$id_db=mysql_select_db("sondage");
	$request="SELECT * FROM spectateurs";
	$result=mysql_query($request);
	while($ligne=mysql_fetch_array($result)){
		$dernumero=$ligne[0]+1;
	}
	if ((isset($_SESSION['num']))
	{
	$_SESSION['num']=$dernumero;
	$_SESSION['nom']=$_POST['nom'];
	$_SESSION['prenom']=$_POST['prenom'];
	$_SESSION['login']=$_POST['login'];
	$_SESSION['mdp']=$_POST['mdp'];
	$_SESSION['adresse']=$_POST['adresse'];
	$_SESSION['tel']=$_POST['tel'];
	$_SESSION['annee']=$_POST['annee'];
	$_SESSION['mois']=$_POST['mois'];
	$_SESSION['jour']=$_POST['jour'];
	$_SESSION['CSP']=$_POST['CSP'];
	}
	header('Location: recapitulatif_inscription.php');
?>