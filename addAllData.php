/************************************************
* 	This code snippet updates certain tables in *
* 	the data base individually from a single	*
* 	web form.									*
*************************************************/
	
<?php

	/******************************************
	* 	Create new instance of data base
	******************************************/
	ini_set('display_errors', 'On');
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu","ghiraldj-db","v1bptepGowZ4t1OE","ghiraldj-db");
	
	
	/******************************************
	 * 		Connect to data base
	 ******************************************/
	if(!$mysqli || $mysqli->connect_errno){
		echo "Connection error " . $mysqli->connect_errno . " " . 
		 $mysqli->connect_error;
	}
		
	/******************************************
	 * 			Food and Drink Input
	 ******************************************/
	if( !($stmtFAD = $mysqli->prepare(
									"INSERT INTO HasFoodTriggers 
									(MigraineID
									FoodTriggerID) 
									VALUES (?, ?)")))
									{
										
		echo "Prepare failed: "  . $stmtFAD->errno . " " . $stmtFAD->error;
	}

	if( !($stmtFAD->bind_param(
							"ss", 
							$_POST['MigraineID'], 
							$_POST['FoodTriggerID'])))
							{
								
		echo "Bind failed: "  . $stmtFAD->errno . " " . $stmtFAD->error;
	}

	
	/******************************************
	 * 				Sensory Input
	 ******************************************/
	if( !($stmtSensor = $mysqli->prepare(
									"INSERT INTO HasSensoryTriggers
									(MigraineID,
									SensoryTriggerID) 
									VALUES (?, ?)")))
									{
										
		echo "Prepare failed: "  . $stmtSensor->errno . " " . $stmtSensor->error;
	}

	if( !($stmtSensor->bind_param(
							"ss", 
							$_POST['MigraineID'], 
							$_POST['SensoryTriggerID'])))
							{
								
		echo "Bind failed: "  . $stmtSensor->errno . " " . $stmtSensor->error;
	}

	
		
	/******************************************
	 * 			Migraine Table Input		  *
	 *****************************************/
	if( !($stmtMigraine = $mysqli->prepare(
									"INSERT INTO Migraine
									(MigraineID,
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
									VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")))
									{
										
		echo "Prepare failed: "  . $stmtMigraine->errno . " " . $stmtMigraine->error;
	}

	if( !($stmtMigraine->bind_param(
							"ssssssssss", 
							$_POST['MigraineID'], 							
							$_POST['MigraineStartTimestamp'], 
							$_POST['MigraineEndTimestamp'], 
							$_POST['UserID'],
							$_POST['MigraineIntensityID'],
							$_POST['WaterIntakeTriggerID'],
							$_POST['StressTriggerID'],
							$_POST['PhysicalActivityTriggerID'],
							$_POST['SleepTriggerID'],
							$_POST['HormoneTriggerID'])))
							{
								
		echo "Bind failed: "  . $stmtMigraine->errno . " " . $stmtMigraine->error;
	}
	
	
	
	/**********************************************
	 * Execute mySLQi commands for each table data		
	 **********************************************/
	/*
	if ( !$stmtMigraine->execute() ){		
		echo "Execute failed: "  . $stmtMigraine->errno . " " . $stmtMigraine->error;
	}
	*/
	if ( !$stmtFAD->execute() ){
		echo "Execute failed: "  . $stmtFAD->errno . " " . $stmtFAD->error;
	}
	if ( !$stmtSensor->execute() ){
		echo "Execute failed: "  . $stmtSensor->errno . " " . $stmtSensor->error;
	}
	
	
	// No ERRORS, proceed to landing page with all summary data
	echo "No Errors from DB";
	//header("Refresh: 0, url=landing.html");

	
?>
