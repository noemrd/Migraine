/******************************************
 * Migraine Table Input
 *	Migraine ID 
 *  Migraine Intensity
 *	Migraine Start Timestamp
 *	Migraine End Timestamp
 *  Migraine User ID
 ******************************************/

<?php

	ini_set('display_errors', 'On');
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu","ghiraldj-db","v1bptepGowZ4t1OE","ghiraldj-db");

	if(!$mysqli || $mysqli->connect_errno){
		echo "Connection error " . $mysqli->connect_errno . " " . 
		 $mysqli->connect_error;
	}

	// Add migraine data to Migraine Table
	if( !($stmt = $mysqli->prepare(
									"INSERT INTO migraines 
									(MigraineID,
									MigraineIntensity,
									MigraineStartTimestamp,
									MigraineEndTimestamp,
									UserID) 
									VALUES (?, ?, ?, ?, ?)")))
									{
										
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}

	if( !($stmt->bind_param(
							"sssss", 
							$_POST['MigraineID'], 
							$_POST['MigraineIntensity'], 
							$_POST['MigraineStartTimestamp'], 
							$_POST['MigraineEndTimestamp'], 
							$_POST['UserID'])))
							{
								
		echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
	}

	if(!$stmt->execute()){
		echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;

	} else {
		
		header("Refresh: 0, url=landing.html");

	}
?>
