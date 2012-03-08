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
		<title> Page d'inscription </title>
	</head>
	<body>
		<h1>Inscription Spectateur</h1></br></br>
		<form name="newspec" action="verif_inscription.php" method="post" action="inscription_spectateurs.php" onSubmit="verif_inscription.php"><TABLE>
			<caption><h2>Saisie d'un nouveau spectateur</h2></caption>
			<tr>
				<th>Nom</th><td><input type="text" name="nom" maxlength="30" size=20></td>
			</tr>
			<tr>
				<th>Prénom</th><td><input type="text" name="prenom" maxlength="30" size=20></td>
			</tr>
			<tr>
				<th>Login</th><td><input type="text" name="login" maxlength="20" size=20></td>
			</tr>
			<tr>
				<th>Mot de Passe</th><td><input type="text" name="mdp" maxlength="10" size=20></td>
			</tr>
			<tr>
				<th>Adresse</th><td><textarea name="adresse" rows=3 cols=20></textarea></td>
			</tr>
			<tr>
				<th>Téléphone</th><td><input type="text" name="tel" maxlength="10" size=20></td>
			</tr>
			<tr>
				<th>Date de naissance (jj-mm-aaaa)</th><td><input type="text" name="jour" maxlength="2" size=2> - <input type="text" name="mois" maxlength="2" size=2> - <input type="text" name="annee" maxlength="4" size=4></td>
			</tr>
			<tr>
				<th>C.S.P.</th><td><select name="CSP">
									<option value="default"><i>Choisissez une catégorie</i>
									<option value="Sans Prof.">Sans Profession
									<option value="Mere au foyer">Mère au foyer
									<option value="Etudiant">Etudiant
									<option value="Employe">Employé
									<option value="Directeur">Directeur
									<option value="Fonction Publique">Fonction Publique
									<option value="Prof. Lib.">Profession Libérale
									<option value="Artisan">Artisan
									</select>
								</td>
			</tr>
			<tr>
				<th></th><td><input type="submit" value="Enregistrer"><input type="reset" name="effacer" value="Rétablir"></td>
			</tr>
		</table></form></br></br>
		<a href="main.php">Retour à la page d'accueil</a>
	</body>
</html>
if ( isset($_POST) && (!empty($_POST['nom']))
				   && (!empty($_POST['prenom']))
				   && (!empty($_POST['adresse']))
				   && (!empty($_POST['tel']))
				   && (!empty($_POST['annee']))
				   && (!empty($_POST['mois']))
				   && (!empty($_POST['jour']))
				   && ($_POST['CSP']!="default")
				   ){
<script language="javascript">
	function verif_form(){
		if(document.newspec.nom.value==''){
			alert("Vous devez saisir un nom.");
			return false;
		}
		if(document.newspec.prenom.value==''){
			alert("Vous devez saisir un prénom.");
			return false;
		}
		if(document.newspec.login.value==''){
			alert("Vous devez saisir un login : ce login vous sera nécessaire pour vous identifier et avoir accés aux informations du site.");
			return false;
		}
		if(document.newspec.mdp.value==''){
			alert("Vous devez saisir un mot de passe : ce mot de passe vous sera nécessaire pour vous identifier et avoir accés aux informations du site.");
			return false;
		}
		if(document.newspec.adresse.value==''){
			alert("Vous devez saisir une adresse.");
			return false;
		}
		if(document.newspec.tel.value==''){
			alert("Vous devez saisir un numéro de téléphone.");
			return false;
		}
		if((document.newspec.jour.value=='')||(document.newspec.mois.value=='')||(document.newspec.annee.value=='')){
			alert("Vous devez saisir une date de naissance.");
			return false;
		}
		if(document.newspec.CSP.value=="default"){
			alert("Vous devez saisir une CSP.");
			return false;
		}
	}
</script>