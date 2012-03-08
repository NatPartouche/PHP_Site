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
		<title> Bdd des cinémas </title>
	</head>
	<body>
		<h1>Base de données des cinémas</h1></br></br>
		<table BORDER>
			<caption><h2>Liste des cinémas</h2></caption>
			<tr>
				<th>Nom</th><th>Adresse</th><th>Visa</th><th>Nom du film</th><th>Heure de projection</th>
			</tr>
<?php		
		$request="SELECT * FROM salles";
		if($result=mysql_query($request)){
		while($ligne=mysql_fetch_array($result)){
			$nom=$ligne[0];
			$visa=$ligne[1];
			$res=mysql_query("SELECT * FROM films WHERE visa='$visa'");
			while($lig=mysql_fetch_array($res)){
				$nom_film=$lig[1];
				}
			$adresse=$ligne[2];
			$heure=$ligne[3];
?>
			<tr>
				<td><?php echo $nom;?></td></td><td><?php echo $adresse;?><td><?php echo $visa;?></td><td><?php echo $nom_film?></td><td><?php echo $heure;?></td>
			</tr>
<?php 		
		}
?>	       
		</table></br></br>
		<a href="liste_spectateurs.php">Liste des spectateurs</a></br>
		<a href="liste_films.php">Liste des films</a></br>
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