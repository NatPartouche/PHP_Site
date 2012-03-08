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
		<title> Bdd des spectateurs </title>
	</head>
	<body>
		<h1>Base de données des spectateurs</h1></br></br>
		<table BORDER>
			<caption><h2>Liste des spectateurs</h2></caption>
			<tr>
				<th>Numéro</th><th>Nom</th><th>Prénom</th><th>Adresse</th><th>Téléphone</th><th>Date de naissance</th><th>CSP</th>
			</tr>
<?php		
		$request="SELECT * FROM spectateurs";
		if($result=mysql_query($request)){
			while($ligne=mysql_fetch_array($result)){
				$numero=$ligne[0];
				$nom=$ligne[1];
				$prenom=$ligne[2];
				$adresse=$ligne[5];
				$telephone=$ligne[6];
				$datedenaissance=$ligne[7];
				$CSP=$ligne[8];?>
		
			<tr>
				<td><?php echo $numero;?></td><td><?php echo $nom;?></td><td><?php echo $prenom;?></td><td><?php echo $adresse;?></td><td><?php echo $telephone;?></td><td><?php echo $datedenaissance;?></td><td><?php echo $CSP;?></td>
			</tr>
<?php 		}
?>	       
		</table></br></br>
		<a href="liste_films.php">Liste des films</a></br>
		<a href="liste_cinemas.php">Liste des cinémas</a></br>
		<a href="liste_avis.php">Liste des avis</a></br>
		<a href="sondage.php">Donner son avis sur un film</a></br>
		<a href="accueil_spectateur.php">Retour à la page d'accueil</a></br>
		<a href="main.php">Se déconnecter</a>
	</body>
</html>
<?php	}else{
			echo "Erreur de requête de base de données";
		}
	mysql_close($id);
?>