<?php
	/************************************************
	* 	This code snippet updates certain tables in *
	* 	the data base individually from a single	*
	* 	web form.									*
	*************************************************/

	// Turn on Error reporting
	ini_set('display_errors', 'On');
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	// Allow for echo statements - Set to False to allow redirection and change of headers
	$DEBUG = False;
	
	// Var if Error has occured
	$error = False;
	$errorStatement = "";
	
	// Instance of DB
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu","ghiraldj-db","v1bptepGowZ4t1OE","ghiraldj-db");
	
	
	
	/******************************************
	 * 		Connect to data base
	 ******************************************/
	if(!$mysqli || $mysqli->connect_errno){
		$errorStatement = $mysqli->connect_error;
	}
		
		
	/******************************************
	 * 		Get Form Data
	 ******************************************/
	$startVar 		= $_POST['MigraineStartTimestamp'];
	$endVar 		= $_POST['MigraineEndTimestamp'];
	$screenName 	= $_POST['UserScreenName'];
	$migraineVal 	= intval($_POST['MigraineIntensity']);
	$waterVal 		= $_POST['WaterIntakeTriggerValue'];
	$stressVal		= $_POST['StressTriggerValue'];
	$phyVal			= $_POST['PhysicalActivityTriggerValue'];
	$sleepVal		= $_POST['SleepTriggerValue'];
	$hormoneVal		= $_POST['HormoneTriggerValue'];
	
	// Verify each form data was read correctly
	if($DEBUG){
		echo "<br> Values from form: <br>" . $startVar . "<br> " . $endVar . "<br> " . $screenName . "<br> " . $migraineVal . "<br> " . $waterVal . "<br> " . $stressVal . "<br> " . $phyVal . "<br> " . $sleepVal . "<br> " . $hormoneVal . "<br>";
	}
	
	/******************************************
	 * 		Queries to fetch IDs
	 ******************************************/	 
	$userSql = "SELECT UserID
				FROM Users
				WHERE (Users.UserScreenName = '$screenName')";
	if( !($userResult = $mysqli->prepare( $userSql ))){
		$error = True;
		$errorStatement = $userResult->error;
	}
	if(!$userResult->execute()){
		$error = True;
		$errorStatement = $userResult->error;
	}
	if(!$userResult->bind_result($UserID)){
		$error = True;
		$errorStatement = $userResult->error;
	}
	$userResult->fetch();	
	$userResult->store_result();
	$userResult->close();
	
	
	$migraineIntensitySql = "SELECT MigraineIntensityID 
							 FROM MigraineIntensity
							 WHERE (MigraineIntensity.MigraineIntensityValue = '$migraineVal')";
	if( !($migraineIntResult = $mysqli->prepare( $migraineIntensitySql) )){
		$error = True;
		$errorStatement = $migraineIntResult->error;
	}	
	if(!$migraineIntResult->execute()){
		$error = True;
		$errorStatement = $migraineIntResult->error;
	}
	if(!$migraineIntResult->bind_result($MigraineIntensityID)){
		$error = True;
		$errorStatement = $migraineIntResult->error;
	}
	$migraineIntResult->fetch();	
	$migraineIntResult->store_result();
	$migraineIntResult->close();
	

	
	$waterSql = "SELECT WaterIntakeTriggerID
			FROM WaterIntakeTrigger
			WHERE (WaterIntakeTrigger.WaterIntakeTriggerValue = '$waterVal')";
	if( !$waterResult = $mysqli->prepare( $waterSql ) ){
		$error = True;
		$errorStatement = $waterResult->error;
	}
	if(!$waterResult->execute()){
		$error = True;
		$errorStatement = $waterResult->error;
	}
	if(!$waterResult->bind_result( $WaterIntakeTriggerID )){
		$error = True;
		$errorStatement = $waterResult->error;
	}
	$waterResult->fetch();	
	$waterResult->store_result();	
	$waterResult->close();
	

	
	$stressSql = "SELECT StressTriggerID
			FROM StressTrigger
			WHERE (StressTrigger.StressTriggerValue = '$stressVal')";
	if( !$stressResult = $mysqli->prepare( $stressSql ) ){
		$error = True;
		$errorStatement = $stressResult->error;
	}
	if(!$stressResult->execute()){
		$error = True;
		$errorStatement = $stressResult->error;
	}
	if(!$stressResult->bind_result($StressTriggerID)){
		$error = True;
		$errorStatement = $stressResult->error;
	}
	$stressResult->fetch();	
	$stressResult->store_result();
	$stressResult->close();
	
	
	
	$phySql = "SELECT PhysicalActivityTriggerID
			FROM PhysicalActivityTrigger
			WHERE (PhysicalActivityTrigger.PhysicalActivityTriggerValue = '$phyVal')";
	if( !$phyResult = $mysqli->prepare( $phySql )){
		$error = True;
		$errorStatement = $phyResult->error;
	}
	if(!$phyResult->execute()){
		$error = True;
		$errorStatement = $phyResult->error;
	}
	if(!$phyResult->bind_result( $PhysicalActivityTriggerID )){
		$error = True;
		$errorStatement = $phyResult->error;
	}
	$phyResult->fetch();
	$phyResult->store_result();	
	$phyResult->close();
	
	
	
	$sleepSql = "SELECT SleepTriggerID
			FROM SleepTrigger
			WHERE (SleepTrigger.SleepTriggerValue = '$sleepVal')";
	if( !$sleepResult = $mysqli->prepare($sleepSql) ){
		$error = True;
		$errorStatement = $sleepResult->error;
	}
	if(!$sleepResult->execute()){
		$error = True;
		$errorStatement = $sleepResult->error;
	}
	if(!$sleepResult->bind_result($SleepTriggerID)){
		$error = True;
		$errorStatement = $sleepResult->error;
	}
	$sleepResult->fetch();	
	$sleepResult->store_result();
	$sleepResult->close();
	
		
	
	$hormoneSql = "SELECT HormoneTriggerID
			FROM HormoneTrigger
			WHERE (HormoneTrigger.HormoneTriggerValue = '$hormoneVal')";		
	if( !$hormoneResult = $mysqli->prepare($hormoneSql) ){
		$error = True;
		$errorStatement = $hormoneResult->error; 
	}
	if(!$hormoneResult->execute()){
		$error = True;
		$errorStatement = $hormoneResult->error; 
	}
	if(!$hormoneResult->bind_result($HormoneTriggerID)){
		$error = True;
		$errorStatement = $hormoneResult->error; 
	}
	$hormoneResult->fetch();	
	$hormoneResult->store_result();
	$hormoneResult->close();
	
	
	
	/******************************************
	 * 		IDs fetched from DB
	 ******************************************/
	if($DEBUG){
		echo "<br><br>";
		echo "UserID: " . $UserID . "<br>";
		echo "MigraineIntensityID: " . $MigraineIntensityID . "<br>";
		echo "WaterIntakeTriggerID: " . $WaterIntakeTriggerID . "<br>";
		echo "StressTriggerID: " . $StressTriggerID . "<br>";
		echo "PhysicalActivityTriggerID: " . $PhysicalActivityTriggerID . "<br>";
		echo "SleepTriggerID: " . $SleepTriggerID . "<br>";
		echo "HormoneTriggerID: " . $HormoneTriggerID . "<br>";
	}
	
	
	/******************************************
	 * 		Migraine Table
	 ******************************************/
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
		$error = True;
		$errorStatement = $migraineResult->error;		
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
		$error = True;
		$errorStatement = $migraineResult->error;
	}
	if( !($migraineResult->execute() )){
		$error = True;		
		$errorStatement = $migraineResult->error;
	}
	$migraineResult->store_result();
	$migraineResult->close();
	
	
	
	
	
	/******************************************
	 * 		Has Food Triggers Table
	 ******************************************/
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
		$error = True;
		$errorStatement = $foodResult->error;
	}
	
	/******************************************
	 * 	Loop over each Trigger for Food and
	 *	push each one to DB with the same
	 *  MigraineID.
	 ******************************************/	
	if(isset($_POST['FoodTriggerItem'])) {
		$foodTrigger = $_POST['FoodTriggerItem'];
		
		if($DEBUG){
			echo "You chose the following FoodTrigger(s): <br>";
			echo "<ul>";
		}
		foreach ($foodTrigger as $food){
			if($DEBUG){ echo "<li>" .$food."</li>"; }
			if( !($foodResult->bind_param(
							"sss", 	
							$_POST['MigraineStartTimestamp'],
							$_POST['UserScreenName'],
							$food )))
							{		
				$error = True;							
				$errorStatement = $foodResult->error;
			}
			
			if( !($foodResult->execute() )){
				$error = True;
				$errorStatement = $foodResult->error;
			}
		}
		
		if($DEBUG){ echo "</ul>"; }
	} else {
		if($DEBUG){ echo "You did not choose a Food Trigger."; }
	}
	
	$foodResult->store_result();
	$foodResult->close();
	


	/******************************************
	 *	Has Sensory Triggers
	 ******************************************/
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
		$error = True;
		$errorStatement = $sensoryResult->error;
	}	

	
	/******************************************
	 * 	Loop over each Trigger for Sensory and
	 *	push each one to DB with the same
	 *  MigraineID.
	 ******************************************/	
	if(isset($_POST['SensoryTriggerValue'])) {
		$sensoryTrigger = $_POST['SensoryTriggerValue'];
		
		if($DEBUG){
			echo "You chose the following SensoryTrigger(s): <br>";
			echo "<ul>";
		}
		foreach ($sensoryTrigger as $sensor){
			if($DEBUG){ echo "<li>" .$sensor."</li>"; }
			if( !($sensoryResult->bind_param(
							"sss", 	
							$_POST['MigraineStartTimestamp'],
							$_POST['UserScreenName'],
							$sensor )))
							{								
				$error = True;
				$errorStatement = $sensoryResult->error;
			}
			
			if( !($sensoryResult->execute() )){
				$error = True;
				$errorStatement = $sensoryResult->error;
			}
		}
		
		if($DEBUG){ echo "</ul>"; }
	} else {
		if($DEBUG){ echo "You did not choose a Sensory Trigger."; }
	}
	$sensoryResult->store_result();
	$sensoryResult->close();
	
	
	/******************************************
	 * 	If there was an error, push error 
	 *	statement to next page.
	 *	If successfully pushed form, proceed 
	 *	to next html page.
	 ******************************************/
	if( $error ){
		echo "ERROR: " . $errorStatement;
		//header("Refresh: 0, url=MigraineSubmitError.html");
	} else {
		header("Refresh: 0, url=submitCompMsg.php?user=$screenName");
	}
	
	
?>
