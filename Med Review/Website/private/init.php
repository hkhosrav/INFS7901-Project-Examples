<?php
	ob_start(); //ensure output buffering turned on

	// Assign file path constants no matter where project saved
	define("PRIVATE_PATH", dirname(__FILE__));
	define("PROJECT_PATH", dirname(PRIVATE_PATH));
	define("PUBLIC_PATH", PROJECT_PATH . '/public');
	define("SHARED_PATH", PRIVATE_PATH . '/shared');

	// Assign root url path constant no matter where project hosted
	$end_pos = strpos($_SERVER['SCRIPT_NAME'], '/public') +7;
	$root = substr($_SERVER['SCRIPT_NAME'], 0, $end_pos);
	define("WWW_ROOT", $root);

	require_once('functions.php');
	require_once('database.php');
	require_once('query_functions.php');

	$db = db_connect(); // opens connection to database when each page loads

?>