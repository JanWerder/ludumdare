<?php

// **** GLOBAL DATABASE VARIABLE **** //
$db = null;

// Logging function specific to database operations //
function db_log( $msg ) {
	error_log( "CMW DB ERROR: " . $msg );
	echo "<strong>CMW DB ERROR:</strong> " . $msg . "<br />";
}

// Check database config //
if ( !isset($cfg_db_host) ) {
	db_log( "No database host name set." );
}
if ( !isset($cfg_db_name) ) {
	db_log( "No database name set." );
}
if ( !isset($cfg_db_login) ) {
	db_log( "No database login set." );
}
if ( !isset($cfg_db_password) ) {
	db_log( "No database password set." );
}

// Are we connected and ready to use the Database? //
function db_isConnected() {
	global $db;
	return isset($db);
}
// Connect to the Database //
function db_connect() {
	global $db;
	
	global $cfg_db_host;
	global $cfg_db_name;
	global $cfg_db_login;
	global $cfg_db_password;

	if ( !db_isConnected() ) {
		$db = new mysqli($cfg_db_host,$cfg_db_login,$cfg_db_password,$cfg_db_name);
		
		// http://php.net/manual/en/mysqli.quickstart.connections.php
		if ($db->connect_errno) {
    		db_log( "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error );
    	}
	}
	else {
		db_log( "Database connection already initialized" );
	}
}



?>