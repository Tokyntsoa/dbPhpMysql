<?php
	try{
	//$bdd = new PDO('mysql:host=localhost;dbname=mabase','root','root');
	$bdd = new PDO('mysql:host=mysql://mysql:3306/;dbname=mabase','root','root');
	}catch (Exception $ex){
		die('Erreur sur la base : '.$ex->getMessage());
	}
?>

