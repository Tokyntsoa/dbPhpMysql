<?php
	$dbhost = getenv("MYSQL_SERVICE_HOST");
	$dbport = getenv("MYSQL_SERVICE_PORT");
	$dbuser = getenv("MYSQL_USER");
	$dbname = getenv("MYSQL_DATABASE");
	$dbpwd = getenv("MYSQL_ROOT_PASSWORD");

	$dsn = 'mysql:dbname='.$dbname.';host='.$dbhost.';port='.$dbport;
	
	echo " Host : ".$dbhost."<br/>";
	echo " Port : ".$dbport."<br/>";
	echo " User : ".$dbuser."->".data['database-user']."<br/>";
	echo " Password : ".$dbpwd."->".data['database-password']."-".data['database-root-password']."<br/>";
	echo " Database : ".$dbname."->".data['database-name']."<br/>";
	
	echo "<br/><br/><br/>";

	try{		
		$bdd = new PDO($dsn,$dbuser, $dbpwd);
	}catch (Exception $ex){
		die('Erreur sur la base : '.$ex->getMessage());
	}
?>

