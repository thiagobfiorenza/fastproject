<?php
	$banco = array(
		'phptype'  => 'mysqli',
		'username' => 'root',
		'password' => '',
		'hostspec' => 'localhost',
		'database' => 'fastproject'
	);
	
	$opcoes = array(
		'debug' => 2,
		'portability' => MDB2_PORTABILITY_ALL
	);
	
	$con =& MDB2::connect($banco, $opcoes);
	if (PEAR::isError($con)) {
		die($con->getMessage());
	}
	$con->setFetchMode(MDB2_FETCHMODE_OBJECT);
	$con->query("SET CHARACTER SET 'utf8'");
?>
