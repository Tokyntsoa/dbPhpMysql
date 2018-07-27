<?php
	$dbhost = getenv("MYSQL_SERVICE_HOST");
	$dbport = getenv("MYSQL_SERVICE_PORT");
	$dbuser = getenv("MYSQL_USER");
	$dbname = getenv("MYSQL_DATABASE");
	$dbpwd = getenv("MYSQL_PASSWORD");

	$dsn = 'mysql:dbname='.$dbname.';host='.$dbhost.';port='.$dbport;
	
	try{		
		$bdd = new PDO($dsn,$dbuser, $dbpwd);
	}catch (Exception $ex){
		die('Erreur sur la base : '.$ex->getMessage());
	}
?>

