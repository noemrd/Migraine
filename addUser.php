/******************************************
 * User Input
 *	ID
 *	First Name
 *  Last Name
 *	Screen Name
 *	Password
 ******************************************/

 
 <?php

	ini_set('display_errors', 'On');
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu","ghiraldj-db","v1bptepGowZ4t1OE","ghiraldj-db");

	if(!$mysqli || $mysqli->connect_errno){
		echo "Connection error " . $mysqli->connect_errno . " " . 
		 $mysqli->connect_error;
	}

	// Add user data to User Table
	if( !($stmt = $mysqli->prepare(
									"INSERT INTO user 
									(UserID,
									UserFirstName
									UserLastName,
									UserScreenName,
									UserPassword) 
									VALUES (?, ?, ?, ?, ?)")))
									{
										
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}

	if( !($stmt->bind_param(
							"sssss", 
							$_POST['UserID'], 
							$_POST['UserFirstName'], 
							$_POST['UserLastName'], 
							$_POST['UserScreenName'], 
							$_POST['UserPassword'])))
							{
								
		echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
	}

	if(!$stmt->execute()){
		echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;

	} else {
		
		header("Refresh: 0, url=landing.html");

	}
?>
