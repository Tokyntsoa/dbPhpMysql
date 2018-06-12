<?php
	try{
	//$bdd = new PDO('mysql:host=localhost;dbname=mabase','root','root');
	$bdd = new PDO('mysql:host=mysql-56-centos7-phpmysql.apps.192.168.96.100.nip.io;dbname=mabase','root','root');
	}catch (Exception $ex){
		die('Erreur sur la base : '.$ex->getMessage());
	}
?>

