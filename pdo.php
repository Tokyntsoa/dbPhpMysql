<?php
	try{
	$bdd = new PDO('mysql:host=localhost;dbname=mabase','root','');
	}catch (Exception $ex){
		die('Erreur sur la base : '.$ex->getMessage());
	}
?>
