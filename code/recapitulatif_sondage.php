<?php
	session_start();
	if($id=mysql_connect("localhost","root","root")){
		if($id_db=mysql_select_db("sondage")){
			echo "Connexion établie";
		}else{
			die("Echec de connexion à la base");
		}	
	}else{
		die("Echec de connexion au serveur de base de données");
	}
	mysql_close($id);
?>
<script language="javascript">
	dateetjour=new Date();
	document.write(" le ",dateetjour.getDate(),".",dateetjour.getMonth()+1,".",dateetjour.getYear());
	document.write(" à ",dateetjour.getHours(),"h",dateetjour.getMinutes(),"min",dateetjour.getSeconds(),"s<br />");
</script> 
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title> Page récapitulative </title>
	</head>
	<body>
		<h1>Récapitulatif du sondage</h1></br></br>
		<form name="recap" action="rec_sondage.php" method="post" action="recapitulatif_sondage.php" onSubmit="rec_sondage.php">
			<table>
			<tr>
				<th>Votre numéro</th><td><?php echo $_SESSION['numero'];?></td>
			</tr>
			<tr>
				<th>Nom du film vu</th><td><?php echo $_SESSION['nomfilm'];?></td>
			</tr>
			<tr>
				<th>Avis</th><td><?php echo $_SESSION['avis'];?></td>
			</tr>
			<tr>
				<th></th><td><input type="submit" value="Confirmer"></td>
			</tr>
		</table></form></br></br>
		<a href="sondage.php">Modifier votre avis</a></br>
		<a href="accueil_spectateur.php">Retour à la page d'accueil</a></br>
		<a href="logout.php">Se déconnecter</a>
	</body>
</html>
