<?php
	session_start();
	$id=mysql_connect("localhost","root","root");
	$id_db=mysql_select_db("sondage");
	$login=$_POST['login'];
	$mdp=$_POST['mdp'];
	$result=mysql_query("SELECT mdp FROM spectateurs WHERE login='$login'");
	if(mysql_num_rows($result)>0){
		$donnees=mysql_fetch_assoc($result);
		if($mdp==$donnees['mdp']){
			$_SESSION['login']=$login;
			$_SESSION['mdp']=$mdp;
			header('Location: accueil_spectateur.php');
		}
		else{
?>
			<html>
				<body>
					<h2>Erreur de connexion : Veuillez saisir un mot de passe correct.</h2>
					<a href="main.php">Recommencer</a>
				</body>
			</html>
<?php
		}	
	}
	if(mysql_num_rows($result)==0){
?>
		<html>
			<body>
				<h2>Erreur de connexion : Veuillez saisir un login correct.</h2>
				<a href="main.php">Recommencer</a>
			</body>
		</html>
<?php
	}
?>	
