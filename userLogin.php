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

	if(!$stmt->bind_result($UserFirstName, $UserLastName, $UserScreenName, $UserPassword)){
		echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	
	$stmt->fetch();
	
	if ($UserPassword == "" || $UserScreenName == ""){
		header("Refresh: 0, url=userLoginError.html");
	} else {
		header("Refresh: 0, url=main.php"); // User is Logged in proceed to next page
	}
	
	//while($stmt->fetch()){
	//	echo "User First Name: " . $UserFirstName . PHP_EOL;
	//	echo "User Last Name: " . $UserLastName . PHP_EOL;
	//	echo "User Screen Name: " . $UserScreenName . PHP_EOL;
	//	echo "User Password: " . $UserPassword . PHP_EOL;
	//}
	
	$stmt->close();
?>