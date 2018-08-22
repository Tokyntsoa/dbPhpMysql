<?php
	$dbhost = getenv("MYSQL_SERVICE_HOST");
	$dbport = getenv("MYSQL_SERVICE_PORT");
	$dbuser = getenv("MYSQL_USER");
	$dbname = getenv("MYSQL_DATABASE");
	$dbpwd = getenv("MYSQL_ROOT_PASSWORD");
	
	echo " Host : ".$dbhost."<br/>";
	echo " Port : ".$dbport."<br/>";
	echo " User : ".$dbuser."<br/>";
	echo " Password : ".$dbpwd."<br/>";
	echo " Database : ".$dbname."<br/>";
	
	echo "<br/><br/><br/>";

	try{		
		$bdd = new PDO('mysql:host='.$dbhost.':'.$dbport.';dbname='.$dbname,$dbuser,$dbpwd);
		//$bdd = new PDO('mysql:host=172.30.190.14:3306;dbname=mabase','mysql','mysql');
	}catch (Exception $ex){
		die('Erreur sur la base : '.$ex->getMessage());
	}
?>

