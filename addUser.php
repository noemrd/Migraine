 <?php

	ini_set('display_errors', 'On');
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu","ghiraldj-db","v1bptepGowZ4t1OE","ghiraldj-db");

	if(!$mysqli || $mysqli->connect_errno){
		echo "Connection error " . $mysqli->connect_errno . " " .  $mysqli->connect_error;
	}

	// Add user data to User Table
	if( !($stmtUser = $mysqli->prepare(
									"INSERT INTO Users
									(UserID,
									UserFirstName,
									UserLastName,
									UserScreenName,
									UserPassword) 
									VALUES (?, ?, ?, ?, ?)")))
									{
										
		echo "Prepare failed: "  . $stmtUser->errno . " " . $stmtUser->error;
	}

	if( !($stmtUser->bind_param(
							"sssss", 
							$_POST['UserID'], 
							$_POST['UserFirstName'], 
							$_POST['UserLastName'], 
							$_POST['UserScreenName'], 
							$_POST['UserPassword'])))
							{								
		echo "Bind failed: "  . $stmtUser->errno . " " . $stmtUser->error;
	}

	if(!$stmtUser->execute()){
		echo "Execute failed: "  . $stmtUser->errno . " " . $stmtUser->error;
	} else {		
		header("Refresh: 0, url=landing.html");
	}
?>
