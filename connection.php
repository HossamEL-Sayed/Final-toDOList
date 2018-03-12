<?php

require "./config.php"; 

$handler = new PDO (
	'mysql:host='.$dbConfig['host'].
	'; dbname='.$dbConfig['db_name'],
	 $dbConfig['root'],
	  $dbConfig['password']
	);
$handler->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
 ?>
