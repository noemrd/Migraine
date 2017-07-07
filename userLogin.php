<?php

	ini_set('display_errors', 'On');
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu","ghiraldj-db","v1bptepGowZ4t1OE","ghiraldj-db");

	if(!$mysqli || $mysqli->connect_errno){
			echo "Connection error " . $mysqli->connect_errno . " " . 
			 $mysqli->connect_error;
	}

	$passwordVar = $_POST['UserPassword'];

	if(!($stmt = $mysqli->prepare("
		SELECT UserFirstName, UserLastName, UserScreenName, UserPassword
		FROM Users
		WHERE (Users.UserPassword = '$passwordVar')" ))){
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}

	if(!$stmt->execute()){
		echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}

	if(!$stmt->bind_result($UserScreenName, $UserFirstName, $UserLastName, $UserPassword)){
		echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}

	while($stmt->fetch()){
		echo "User First Name: " . $UserFirstName . "\n";
		echo "User Last Name: " . $UserLastName . "\n";
		echo "User Screen Name: " . $UserScreenName . "\n";
		echo "User Password: " . $UserPassword . "\n";
	}

	$stmt->close();
?>