/************************************************
* 	This code snippet updates certain tables in *
* 	the data base individually from a single	*
* 	web form.									*
*************************************************/

<?php

	ini_set('display_errors', 'On');
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

	//echo "<br> Values from form: <br>" . $startVar . "<br> " . $endVar . "<br> " . $screenName . "<br> " . $migraineVal . "<br> " . $waterVal . "<br> " . $stressVal . "<br> " . $phyVal . "<br> " . $sleepVal . "<br> " . $hormoneVal . "<br>";
	
	/******************************************
	 * 		Queries for IDs
	 ******************************************/	 
	$userSql = "SELECT UserID
				FROM Users
				WHERE (Users.UserScreenName = '$screenName')";
			
	if( !($userResult = $mysqli->prepare( $userSql ))){
		echo "Prepare fails: " . $stmt->errno . " " . $stmt->error;
	}
	
	if(!$userResult->execute()){
		echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$userResult->bind_result($UserID)){
		echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	$userResult->fetch();	
	$userResult->store_result();
	//$mysqli->close();
	
	
	
	$migraineIntensitySql = "SELECT MigraineIntensityID 
							 FROM MigraineIntensity
							 WHERE (MigraineIntensity.MigraineIntensityValue = '$migraineVal')";
			
	if( !($migraineIntResult = $mysqli->prepare( $migraineIntensitySql) )){
		echo "Prepare fails: " . $stmt->errno . " " . $stmt->error;
	}
	if(!$migraineIntResult->execute()){
		echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$migraineIntResult->bind_result($MigraineIntensityID)){
		echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	$migraineIntResult->fetch();	
	$migraineIntResult->store_result();
	//$mysqli->close();
	

	
	$waterSql = "SELECT WaterIntakeTriggerID
			FROM WaterIntakeTrigger
			WHERE (WaterIntakeTrigger.WaterIntakeTriggerValue = '$waterVal')";
			
	$waterResult = $mysqli->prepare( $waterSql );
	
	if(!$waterResult->execute()){
		echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$waterResult->bind_result( $WaterIntakeTriggerID )){
		echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	$waterResult->fetch();	
	$waterResult->store_result();
	//$mysqli->close();
	

	
	$stressSql = "SELECT StressTriggerID
			FROM StressTrigger
			WHERE (StressTrigger.StressTriggerValue = '$stressVal')";
	
	$stressResult = $mysqli->prepare( $stressSql );
	
	if(!$stressResult->execute()){
		echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$stressResult->bind_result($StressTriggerID)){
		echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	$stressResult->fetch();	
	$stressResult->store_result();
	//$mysqli->close();
	
	
	
	$phySql = "SELECT PhysicalActivityTriggerID
			FROM PhysicalActivityTrigger
			WHERE (PhysicalActivityTrigger.PhysicalActivityTriggerValue = '$phyVal')";
			
	$phyResult = $mysqli->prepare( $phySql );
	
	if(!$phyResult->execute()){
		echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$phyResult->bind_result( $PhysicalActivityTriggerID )){
		echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	$phyResult->fetch();
	$phyResult->store_result();	
	//$mysqli->close();
	
	
	
	$sleepSql = "SELECT SleepTriggerID
			FROM SleepTrigger
			WHERE (SleepTrigger.SleepTriggerValue = '$sleepVal')";
	$sleepResult = $mysqli->prepare($sleepSql);
	if(!$sleepResult->execute()){
		echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$sleepResult->bind_result($SleepTriggerID)){
		echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	$sleepResult->fetch();	
	$sleepResult->store_result();
	//$mysqli->close();
	
		
	
	$hormoneSql = "SELECT HormoneTriggerID
			FROM HormoneTrigger
			WHERE (HormoneTrigger.HormoneTriggerValue = '$hormoneVal')";		
	$hormoneResult = $mysqli->prepare($hormoneSql);
	if(!$hormoneResult->execute()){
		echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$hormoneResult->bind_result($HormoneTriggerID)){
		echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	$hormoneResult->fetch();	
	$hormoneResult->store_result();
	//$mysqli->close();
	
	/*
	echo "<br><br>";
	echo "UserID: " . $UserID . "<br>";
	echo "MigraineIntensityID: " . $MigraineIntensityID . "<br>";
	echo "WaterIntakeTriggerID: " . $WaterIntakeTriggerID . "<br>";
	echo "StressTriggerID: " . $StressTriggerID . "<br>";
	echo "PhysicalActivityTriggerID: " . $PhysicalActivityTriggerID . "<br>";
	echo "SleepTriggerID: " . $SleepTriggerID . "<br>";
	echo "HormoneTriggerID: " . $HormoneTriggerID . "<br>";
	*/
	
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
								
		echo "Bind failed: "  . $stmtUser->errno . " " . $stmtUser->error;
	}
	
	if( !($migraineResult->execute() )){
		echo "Execute failed" . "<br>";
	}
	$migraineResult->close();
	
	// Has Food Triggers
	
	// Has Sensory Triggers
	 
?>
