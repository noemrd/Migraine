/******************************************
 * Hormone Input
 *	ID
 *	Value
 *  Migraine ID
 ******************************************/

 
 <?php

	ini_set('display_errors', 'On');
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu","ghiraldj-db","v1bptepGowZ4t1OE","ghiraldj-db");

	if(!$mysqli || $mysqli->connect_errno){
		echo "Connection error " . $mysqli->connect_errno . " " . 
		 $mysqli->connect_error;
	}

	// Add hormone data to Hormonw Table
	if( !($stmt = $mysqli->prepare(
									"INSERT INTO hormone
									(HormoneTriggerID,
									HormoneTriggerValue,
									MigraineID) 
									VALUES (?, ?, ?)")))
									{
										
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}

	if( !($stmt->bind_param(
							"sss", 
							$_POST['HormoneTriggerID'], 
							$_POST['HormoneTriggerValue'],
							$_POST['MigraineID'])))
							{
								
		echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
	}

	if(!$stmt->execute()){
		echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;

	} else {
		
		header("Refresh: 0, url=landing.html");

	}
?>
