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
		<h1>Récapitulatif d'inscription</h1></br></br>
		<form name="recap" action="rec_inscription.php" method="post" action="recapitulatif_inscription.php" onSubmit="rec_inscription.php">
			<table>
				<tr>
					<th>Numéro</th><td><?php echo $_SESSION['num'];?></td>
				</tr>
				<tr>
					<th>Nom</th><td><?php echo $_SESSION['nom'];?></td>
				</tr>
				<tr>
					<th>Prénom</th><td><?php echo $_SESSION['prenom'];?></td>
				</tr>
				<tr>
					<th>Login</th><td><?php echo $_SESSION['login'];?></td>
				</tr>
				<tr>
					<th>Mot de Passe</th><td><?php echo $_SESSION['mdp'];?></td>
				</tr>
				<tr>
					<th>Adresse</th><td><?php echo $_SESSION['adresse'];?></td>
				</tr>
				<tr>
					<th>Téléphone</th><td><?php echo $_SESSION['tel'];?></td>
				</tr>
				<tr>
					<th>Date de naissance</th><td><?php echo $_SESSION['annee'];echo "-";echo $_SESSION['mois'];echo "-";echo $_SESSION['jour'];?></td>
				</tr>
				<tr>
					<th>CSP</th><td><?php echo $_SESSION['CSP'];?></td>
				</tr>
				<tr>
					<th></th><td><input type="submit" value="Confirmer"></td>
				</tr>
			</table>
		</form></br></br>
		<h1>/!\Retenez votre login et votre mot de passe : ils vous seront nécessaires pour vous identifier/!\</h1>
		<a href="inscription_spectateurs.php">Modifier votre inscription</a></br>
		<a href="main.php">Retour à la page d'accueil</a>
	</body>
</html>
