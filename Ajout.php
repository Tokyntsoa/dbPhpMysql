
<?php
	include('pdo.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Test php Mysql</title>
		<link rel="stylesheet" href="css/style.css" />
		<style>
			#insB{
				width:300px;
			}
			#Inserer{
				width:296px;
				font-weight:bold;
			}
			#Inserer:hover{
				color:blue;
			}
		</style>
	</head>
	<body>
		<h1 align="center">TEST PHP-MYSQL</h1>			
		<br/><br/><br/>
		<table align="center" border="2" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC"style="border-collapse: collapse; border-bottom-width:2">
		<tr><th>Id</th><th>Intitulé</th><th>Prix</th><th colspan="2"><a href="index.php"><button id="butA">Annuler ajout</button></a></th></tr>
		<?php 
		$req = $bdd->query('SELECT * FROM article');
		while($donnee = $req->fetch()){
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
		$req->closeCursor();
		?>
		  <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" name="Rchform">
			<tr>
				<td align="center"><input type="text" name="id" id="id" autofocus required /></td>
				<td align="center"><input type="text" name="intitule" id="intitule" required /></td>
				<td align="center"><input type="text" name="prix" id="prix" required /></td>
				<td align="center" colspan="2" id="insB"><input type="submit" name="Inserer" id="Inserer" value="Ajouter"/></td>
			</tr>
		  </form>
		</table>
		<?php if(isset($_POST['Inserer'])){
				$reqI = $bdd->prepare('INSERT INTO article (id,intitule,prix) VALUES (:id,:intitule,:prix)');
				$reqI->execute(array(
									'id' => $_POST['id'],
									'intitule' => $_POST['intitule'],
									'prix' => $_POST['prix']
							   )
						 );	
				$reqI->closeCursor();
				header("location:index.php");
			  }
			  
			  if(isset($_POST['suppr'])){
				$reqS = $bdd->prepare('DELETE FROM article WHERE id = :id');
				$reqS->execute(array('id' => $_POST['id']));
				$reqS->closeCursor();				
				header("location:index.php");
			  }
		?>
	</body>
</html>