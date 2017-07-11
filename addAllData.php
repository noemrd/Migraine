<?php
	/************************************************
	* 	This code snippet updates certain tables in *
	* 	the data base individually from a single	*
	* 	web form.									*
	*************************************************/

	ini_set('display_errors', 'On');
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu","ghiraldj-db","v1bptepGowZ4t1OE","ghiraldj-db");
	
	
	/******************************************
	 * 		Connect to data base
	 ******************************************/
	if(!$mysqli || $mysqli->connect_errno){
		echo "Connection error " . $mysqli->connect_errno . " " . 
		 $mysqli->connect_error;
	}
		
		
	// Get Form Data
	$startVar 		= $_POST['MigraineStartTimestamp'];
	$endVar 		= $_POST['MigraineEndTimestamp'];
	$screenName 	= $_POST['UserScreenName'];
	$migraineVal 	= intval($_POST['MigraineIntensity']);
	$waterVal 		= $_POST['WaterIntakeTriggerValue'];
	$stressVal		= $_POST['StressTriggerValue'];
	$phyVal			= $_POST['PhysicalActivityTriggerValue'];
	$sleepVal		= $_POST['SleepTriggerValue'];
	$hormoneVal		= $_POST['HormoneTriggerValue'];
	echo "<br> Values from form: <br>" . $startVar . "<br> " . $endVar . "<br> " . $screenName . "<br> " . $migraineVal . "<br> " . $waterVal . "<br> " . $stressVal . "<br> " . $phyVal . "<br> " . $sleepVal . "<br> " . $hormoneVal . "<br>";
	
	/******************************************
	 * 		Queries for IDs
	 ******************************************/	 
	$userSql = "SELECT UserID
				FROM Users
				WHERE (Users.UserScreenName = '$screenName')";
			
	if( !($userResult = $mysqli->prepare( $userSql ))){
		echo "Prepare fails: " . $userResult->errno . " " . $userResult->error;
	}
	
	if(!$userResult->execute()){
		echo "Execute failed: "  . $userResult->errno . " " . $userResult->error;
	}
	if(!$userResult->bind_result($UserID)){
		echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	$userResult->fetch();	
	$userResult->store_result();
	$userResult->close();
	//$mysqli->close();
	
	
	$migraineIntensitySql = "SELECT MigraineIntensityID 
							 FROM MigraineIntensity
							 WHERE (MigraineIntensity.MigraineIntensityValue = '$migraineVal')";
			
	if( !($migraineIntResult = $mysqli->prepare( $migraineIntensitySql) )){
		var_dump($migraineIntResult);
		echo "Prepare fails: " . $migraineIntResult->errno . " " . $migraineIntResult->error;
	}
	
	if(!$migraineIntResult->execute()){
		echo "Execute failed: "  . $migraineIntResult->errno . " " . $migraineIntResult->error;
	}
	if(!$migraineIntResult->bind_result($MigraineIntensityID)){
		echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	$migraineIntResult->fetch();	
	$migraineIntResult->store_result();
	$migraineIntResult->close();
	

	
	$waterSql = "SELECT WaterIntakeTriggerID
			FROM WaterIntakeTrigger
			WHERE (WaterIntakeTrigger.WaterIntakeTriggerValue = '$waterVal')";
			
	$waterResult = $mysqli->prepare( $waterSql );
	
	if(!$waterResult->execute()){
		echo "Execute failed: "  . $waterResult->errno . " " . $waterResult->error;
	}
	if(!$waterResult->bind_result( $WaterIntakeTriggerID )){
		echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	$waterResult->fetch();	
	$waterResult->store_result();	
	$waterResult->close();
	

	
	$stressSql = "SELECT StressTriggerID
			FROM StressTrigger
			WHERE (StressTrigger.StressTriggerValue = '$stressVal')";
	
	$stressResult = $mysqli->prepare( $stressSql );
	
	if(!$stressResult->execute()){
		echo "Execute failed: "  . $stressResult->errno . " " . $stressResult->error;
	}
	if(!$stressResult->bind_result($StressTriggerID)){
		echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	$stressResult->fetch();	
	$stressResult->store_result();
	$stressResult->close();
	
	
	
	$phySql = "SELECT PhysicalActivityTriggerID
			FROM PhysicalActivityTrigger
			WHERE (PhysicalActivityTrigger.PhysicalActivityTriggerValue = '$phyVal')";
			
	$phyResult = $mysqli->prepare( $phySql );
	
	if(!$phyResult->execute()){
		echo "Execute failed: "  . $phyResult->errno . " " . $phyResult->error;
	}
	if(!$phyResult->bind_result( $PhysicalActivityTriggerID )){
		echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	$phyResult->fetch();
	$phyResult->store_result();	
	$phyResult->close();
	
	
	
	$sleepSql = "SELECT SleepTriggerID
			FROM SleepTrigger
			WHERE (SleepTrigger.SleepTriggerValue = '$sleepVal')";
	$sleepResult = $mysqli->prepare($sleepSql);
	if(!$sleepResult->execute()){
		echo "Execute failed: "  . $sleepResult->errno . " " . $sleepResult->error;
	}
	if(!$sleepResult->bind_result($SleepTriggerID)){
		echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	$sleepResult->fetch();	
	$sleepResult->store_result();
	$sleepResult->close();
	
		
	
	$hormoneSql = "SELECT HormoneTriggerID
			FROM HormoneTrigger
			WHERE (HormoneTrigger.HormoneTriggerValue = '$hormoneVal')";		
	$hormoneResult = $mysqli->prepare($hormoneSql);
	if(!$hormoneResult->execute()){
		echo "Execute failed: "  . $hormoneResult->errno . " " . $hormoneResult->error;
	}
	if(!$hormoneResult->bind_result($HormoneTriggerID)){
		echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	$hormoneResult->fetch();	
	$hormoneResult->store_result();
	$hormoneResult->close();
	
	// IDs fetched from DB
	echo "<br><br>";
	echo "UserID: " . $UserID . "<br>";
	echo "MigraineIntensityID: " . $MigraineIntensityID . "<br>";
	echo "WaterIntakeTriggerID: " . $WaterIntakeTriggerID . "<br>";
	echo "StressTriggerID: " . $StressTriggerID . "<br>";
	echo "PhysicalActivityTriggerID: " . $PhysicalActivityTriggerID . "<br>";
	echo "SleepTriggerID: " . $SleepTriggerID . "<br>";
	echo "HormoneTriggerID: " . $HormoneTriggerID . "<br>";
	
	// Prepare statement for MySQLi injection
	$migraineSql = "
					INSERT INTO Migraine 
					(
					MigraineStartTimestamp,
					MigraineEndTimestamp,
					UserID,
					MigraineIntensityID,
					WaterIntakeTriggerID,
					StressTriggerID,
					PhysicalActivityTriggerID,
					SleepTriggerID,
					HormoneTriggerID
					)
					VALUES (?,?,?,?,?,?,?,?,?)
					";		
	
	if( !($migraineResult = $mysqli->prepare( $migraineSql ))){
		echo "Prepare Failed" . "<br>";
	}
	
	// Bind parameters to Fetched IDs
	if( !($migraineResult->bind_param(
							"ssiiiiiii", 	
							$_POST['MigraineStartTimestamp'],
							$_POST['MigraineEndTimestamp'],
							$UserID,
							$MigraineIntensityID,
							$WaterIntakeTriggerID,
							$StressTriggerID,
							$PhysicalActivityTriggerID,
							$SleepTriggerID,
							$HormoneTriggerID)))
							{								
		echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	
	if( !($migraineResult->execute() )){
		echo "Execute failed: "  . $migraineResult->errno . " " . $migraineResult->error;		
	}
	$migraineResult->store_result();
	$migraineResult->close();
	
	
	
	
	
	
	// Has Food Triggers
	$foodSql = "
				INSERT INTO HasFoodTriggers 
				SET 
				MigraineID = (
					SELECT table1.MigraineID 
					FROM 
						(SELECT MigraineID, UserID 
						FROM Migraine 
						WHERE Migraine.MigraineStartTImestamp = ?)
					AS table1
					JOIN 
						(SELECT UserID 
						FROM Users 
						WHERE Users.UserScreenName = ?) 
					AS  table2 
					ON table1.UserID = table2.UserID
					),
				FoodTriggerID = (
					SELECT FoodTriggerID
					FROM FoodDrinkTrigger
					WHERE FoodDrinkTrigger.FoodTriggerItem = ?
					)
				";

	if( !($foodResult = $mysqli->prepare( $foodSql ) )){
		echo "Prepare Failed" . "<br>";
	}
	
	$foodTrigger = $_POST['FoodTriggerItem'];

	if(isset($_POST['FoodTriggerItem'])) {
		echo "You chose the following FoodTrigger(s): <br>";
		echo "<ul>";
		foreach ($foodTrigger as $food){
			echo "<li>" .$food."</li>";
			if( !($foodResult->bind_param(
							"sss", 	
							$_POST['MigraineStartTimestamp'],
							$_POST['UserScreenName'],
							$food )))
							{								
				echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			
			if( !($foodResult->execute() )){
				echo "Execute failed: "  . $foodResult->errno . " " . $foodResult->error;		
			}
		}
		
		echo "</ul>";
	} else {
		echo "You did not choose a Food Trigger.";
	}
	
	$foodResult->store_result();
	$foodResult->close();
	


		
	// Has Sensory Triggers
	$sensorySql = "
					INSERT INTO HasSensoryTriggers 
					SET 
					MigraineID = (
							SELECT table1.MigraineID 
							FROM 
								(SELECT MigraineID, UserID 
								FROM Migraine 
								WHERE Migraine.MigraineStartTImestamp = ?)
							AS table1
							JOIN 
								(SELECT UserID 
								FROM Users 
								WHERE Users.UserScreenName = ?) 
							AS  table2 
							ON table1.UserID = table2.UserID
							),
						SensoryTriggerID = (
							SELECT SensoryTriggerID
							FROM SensoryTrigger
							WHERE SensoryTrigger.SensoryTriggerValue = ?
							)
							";

	if( !($sensoryResult = $mysqli->prepare( $sensorySql ) )){
		echo "Prepare Failed" . "<br>";
	}	

	$sensoryTrigger = $_POST['SensoryTriggerValue'];
				
	if(isset($_POST['SensoryTriggerValue'])) {
		echo "You chose the following SensoryTrigger(s): <br>";
		echo "<ul>";
		foreach ($sensoryTrigger as $sensor){
			echo "<li>" .$sensor."</li>";
			if( !($sensoryResult->bind_param(
							"sss", 	
							$_POST['MigraineStartTimestamp'],
							$_POST['UserScreenName'],
							$sensor )))
							{								
				echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			
			if( !($sensoryResult->execute() )){
				echo "Execute failed: "  . $sensoryResult->errno . " " . $sensoryResult->error;		
			}
		}
		
		echo "</ul>";
	} else {
		echo "You did not choose a Sensory Trigger.";
	}
	$sensoryResult->store_result();
	$sensoryResult->close();
							
							
?>
