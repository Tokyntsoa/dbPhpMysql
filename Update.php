<?php
	include('pdo.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Test php Mysql</title>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<h1 align="center">TEST PHP-MYSQL</h1>		
		<br/><br/><br/>
		<table align="center" border="2" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC"style="border-collapse: collapse; border-bottom-width:2">
		<tr><th>Id</th><th>Intitulé</th><th>Prix</th><th colspan="2"><a href="index.php"><button id="butM">Annuler modification</button></a></th></tr>
		<?php
		
		$req = $bdd->query('SELECT * FROM article');
		while($donnee = $req->fetch()){
			if($_GET['valModif']==$donnee['id']){				
			?>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
				<tr>
						<td><?php echo $donnee['id']; ?></td>
						<td><input type="text" name="intitule" id="intitule" value="<?php echo $donnee['intitule']; ?>" /></td>
						<td><input type="text" name="prix" id="prix" value="<?php echo $donnee['prix'];	?>" /></td>
					<td align="center">
						<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
							<input type="text" name="id" id="id" value="<?php echo $donnee['id']; ?>" hidden />
							<input type="submit" name="valmodif" id="valmodif" value="Enregistrer"/>
						</form>
					</td>
					<td align="center">
						<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
							<input type="text" name="id" id="id" value="<?php echo $donnee['id']; ?>" hidden />
							<input type="submit" name="suppr" id="suppr" value="Supprimer"/>
						</form>
					</td>
				</tr>
			</form>
			<?php
			}else{
			?>
			<tr>
				<td><?php echo $donnee['id']; ?></td>
				<td><?php echo $donnee['intitule']; ?></td>
				<td><?php echo $donnee['prix'];	?></td>
				<td align="center">
					<a href="Update.php?valModif=<?php echo $donnee['id']; ?>"><button id="butU">Modifier</button></a>
				</td>
				<td align="center">
					<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
						<input type="text" name="id" id="id" value="<?php echo $donnee['id']; ?>" hidden />
						<input type="submit" name="suppr" id="suppr" value="Supprimer"/>
					</form>
				</td>
			</tr>
		<?php
			}
		}
		
		if(isset($_POST['valmodif'])){
			$reqU = $bdd->query('SELECT * FROM article WHERE id="'.$_GET['valModif'].'"');
			$reqU = $bdd->prepare('UPDATE article SET intitule = :intitule, prix = :prix WHERE id = :id');
			$reqU->execute(array(
								'intitule' => $_POST['intitule'],
								'prix' => $_POST['prix'],
								'id' => $_POST['id']
						   )
					 );	
			
			$reqU->closeCursor();
			header("location:index.php");
		}
		
		if(isset($_POST['suppr'])){
			$reqS = $bdd->prepare('DELETE FROM article WHERE id = :id');
			$reqS->execute(array('id' => $_POST['id']));	
			$reqS->closeCursor();
			header("location:index.php");
		}
		
		$req->closeCursor();
		?>	
		</table>
	</body>
</html>