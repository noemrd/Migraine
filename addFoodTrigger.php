/******************************************
 * Food and Drink Input
 *	ID
 *	Item
 *  Migraine ID
 ******************************************/

 
 <?php

	ini_set('display_errors', 'On');
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu","ghiraldj-db","v1bptepGowZ4t1OE","ghiraldj-db");

	if(!$mysqli || $mysqli->connect_errno){
		echo "Connection error " . $mysqli->connect_errno . " " . 
		 $mysqli->connect_error;
	}

	// Add food data to Food Table
	if( !($stmt = $mysqli->prepare(
									"INSERT INTO food 
									(FoodTriggerID,
									FoodTriggerItem,
									MigraineID) 
									VALUES (?, ?, ?)")))
									{
										
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}

	if( !($stmt->bind_param(
							"sss", 
							$_POST['FoodTriggerID'], 
							$_POST['FoodTriggerItem'],
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
