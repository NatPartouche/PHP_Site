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
		<title> Accueil Ciné-Files </title>
	</head>
	<body>
		<h1>Accueil Ciné-Files</h1>
		<h2>Bienvenue sur le site le plus cinéphile du Web</h2></br></br>
		<form name="ident" action="identification.php" method="post" action="inscription_spectateurs.php" onSubmit="return verif_login();"><TABLE>
			<caption><h2>Authentification</h2></caption>
			<tr>
				<th>Login</th><td><input type="text" name="login" maxlength="20" size=20></td>
			</tr>
			<tr>
				<th>Mot de Passe</th><td><input type="password" name="mdp" maxlength="10" size=20></td>
			</tr>
			<tr>
				<th></th><td><input type="submit" value="Se connecter"><input type="reset" name="effacer" value="Rétablir"></td>
			</tr>
		</table></form>
		<h2> OU </h2></br></br>
		<h3><a href="inscription_spectateurs.php">S'inscrire</a></h3>
	</body>
</html>
<script language="javascript">
	function verif_login(){
		if (document.ident.login.value==''){
			alert("Vous devez saisir un identifiant correct.");
			return false;
		}
		if (document.ident.mdp.value==''){
			alert("Vous devez saisir un mot de passe correct.");
			return false;
		}
		else {
			return true;
		}
	}
</script>