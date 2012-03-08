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
		<title> Bdd des films </title>
	</head>
	<body>
		<h1>Base de données des films</h1></br></br>
		<table BORDER>
			<caption><h2>Liste des films</h2></caption>
			<tr>
				<th>Visa</th><th>Titre</th><th>Nom du Réalisateur</th><th>Année de sortie</th>
			</tr>
<?php		
		$request="SELECT * FROM films";
		if($result=mysql_query($request)){
		while($ligne=mysql_fetch_array($result)){
			$visa=$ligne[0];
			$titre=$ligne[1];
			$nom_realisateur=$ligne[2];
			$annee_sortie=$ligne[3];
?>
			<tr>
				<td><?php echo $visa;?></td><td><?php echo $titre;?></td><td><?php echo $nom_realisateur;?></td><td><?php echo $annee_sortie;?></td>
			</tr>
<?php 		
		}
?>	       
		</table></br></br>
		<a href="liste_spectateurs.php">Liste des spectateurs</a></br>
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