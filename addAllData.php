/************************************************
* 	This code snippet updates all tables in 	*
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
	 * 				Water Input
	 ******************************************/
	if( !($stmtWater = $mysqli->prepare(
									"INSERT INTO WaterIntakeTrigger
									(WaterIntakeTriggerID,
									WaterIntakeTriggerValue) 
									VALUES (?, ?)")))
									{
										
		echo "Prepare failed: "  . $stmtWater->errno . " " . $stmtWater->error;
	}

	if( !($stmtWater->bind_param(
							"ss", 
							$_POST['WaterIntakeTriggerID'], 
							$_POST['WaterIntakeTriggerValue'])))
							{
								
		echo "Bind failed: "  . $stmtWater->errno . " " . $stmtWater->error;
	}

	
	
	
	/******************************************
	 * 			Food and Drink Input
	 ******************************************/
	if( !($stmtFAD = $mysqli->prepare(
									"INSERT INTO FoodDrinkTrigger 
									(FoodTriggerID,
									FoodTriggerItem) 
									VALUES (?, ?)")))
									{
										
		echo "Prepare failed: "  . $stmtFAD->errno . " " . $stmtFAD->error;
	}

	if( !($stmtFAD->bind_param(
							"ss", 
							$_POST['FoodTriggerID'], 
							$_POST['FoodTriggerItem'])))
							{
								
		echo "Bind failed: "  . $stmtFAD->errno . " " . $stmtFAD->error;
	}

	
	/******************************************
	 * 				Sensory Input
	 ******************************************/
	if( !($stmtSensor = $mysqli->prepare(
									"INSERT INTO SensorTrigger 
									(SensorTriggerID,
									SensorTriggerItem) 
									VALUES (?, ?)")))
									{
										
		echo "Prepare failed: "  . $stmtSensor->errno . " " . $stmtSensor->error;
	}

	if( !($stmtSensor->bind_param(
							"ss", 
							$_POST['SensorTriggerID'], 
							$_POST['SensorTriggerItem'])))
							{
								
		echo "Bind failed: "  . $stmtSensor->errno . " " . $stmtSensor->error;
	}

	
	
	/******************************************
	 * 				Hormone Input
	 ******************************************/
	if( !($stmtHormone = $mysqli->prepare(
									"INSERT INTO HormoneTrigger
									(HormoneTriggerID,
									HormoneTriggerValue) 
									VALUES (?, ?)")))
									{
										
		echo "Prepare failed: "  . $stmtHormone->errno . " " . $stmtHormone->error;
	}

	if( !($stmtHormone->bind_param(
							"ss", 
							$_POST['HormoneTriggerID'], 
							$_POST['HormoneTriggerValue'])))
							{
								
		echo "Bind failed: "  . $stmtHormone->errno . " " . $stmtHormone->error;
	}

	
	/******************************************
	 * 		Physical Activity Input
	 ******************************************/
	if( !($stmtPhy = $mysqli->prepare(
									"INSERT INTO PhysicalActivityTrigger
									(PhysicalActivityTriggerID,
									PhysicalActivityTriggerValue) 
									VALUES (?, ?)")))
									{
										
		echo "Prepare failed: "  . $stmtPhy->errno . " " . $stmtPhy->error;
	}

	if( !($stmtPhy->bind_param(
							"ss", 
							$_POST['PhysicalActivityTriggerID'], 
							$_POST['PhysicalActivityTriggerValue'])))
							{
								
		echo "Bind failed: "  . $stmtPhy->errno . " " . $stmtPhy->error;
	}

	
	/******************************************
	 * 				Stress Input
	 ******************************************/
	if( !($stmtStress = $mysqli->prepare(
									"INSERT INTO StressTrigger
									(StressTriggerID,
									StressTriggerValue) 
									VALUES (?, ?)")))
									{
										
		echo "Prepare failed: "  . $stmtStress->errno . " " . $stmtStress->error;
	}

	if( !($stmtStress->bind_param(
							"ss", 
							$_POST['StressTriggerID'], 
							$_POST['StressTriggerValue'])))
							{
								
		echo "Bind failed: "  . $stmtStress->errno . " " . $stmtStress->error;
	}


	
	
	/******************************************
	 * 				Sleep Input
	 ******************************************/
	if( !($stmtSleep = $mysqliSleep->prepare(
									"INSERT INTO SleepTrigger
									(SleepTriggerID,
									SleepTriggerValue) 
									VALUES (?, ?)")))
									{
										
		echo "Prepare failed: "  . $stmtSleep->errno . " " . $stmtSleep->error;
	}

	if( !($stmtSleep->bind_param(
							"ss", 
							$_POST['SleepTriggerID'], 
							$_POST['SleepTriggerValue'])))
							{
								
		echo "Bind failed: "  . $stmtSleep->errno . " " . $stmtSleep->error;
	}

	
	
	/******************************************
	 * 			Migraine Table Input		  *
	 ******************************************/
	if( !($stmtMigraine = $mysqli->prepare(
									"INSERT INTO migraines 
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
	if( !$stmtWater->execute() ){
		echo "Execute failed: "  . $stmtWater->errno . " " . $stmtWater->error;
		
	} else if ( !$stmtMigraine->execute() ){		
		echo "Execute failed: "  . $stmtMigraine->errno . " " . $stmtMigraine->error;
	
	} else if ( !$stmtFAD->execute() ){
		echo "Execute failed: "  . $stmtFAD->errno . " " . $stmtFAD->error;

	} else if ( !$stmtSensor->execute() ){
		echo "Execute failed: "  . $stmtSensor->errno . " " . $stmtSensor->error;

	} else if ( !$stmtHormone->execute() ){
		echo "Execute failed: "  . $stmtHormone->errno . " " . $stmtHormone->error;

	} else if ( !$stmtPhy->execute() ){
		echo "Execute failed: "  . $stmtPhy->errno . " " . $stmtPhy->error;
	
	} else if ( !$stmtStress->execute() ){
		echo "Execute failed: "  . $stmtStress->errno . " " . $stmtStress->error;

	} else if ( !$stmtSleep->execute() ){
		echo "Execute failed: "  . $stmtSleep->errno . " " . $stmtSleep->error;

		
	} else {
		// No ERRORS, proceed to landing page with all summary data
		header("Refresh: 0, url=landing.html");

	}
?>
