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
		echo "<tr>\n<td>\n" . $UserFirstName .  "\n</td>\n</tr>";
		echo "<tr>\n<td>\n" . $UserLastName .  "\n</td>\n</tr>";
		echo "<tr>\n<td>\n" . $UserScreenName .  "\n</td>\n</tr>";
		echo "<tr>\n<td>\n" . $UserPassword .  "\n</td>\n</tr>";
	}

	$stmt->close();
?>