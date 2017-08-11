<script>
     function highlight(id1, id2){
     		$(id1).css("background-color", "yellow");
     		$(id2).css("background-color", "yellow");
     }
	//Citation: https://stackoverflow.com/questions/7763327/how-to-calculate-date-difference-in-javascript(trisweb answer)
	//Checks if there is at least 1 week gap between two dates.
     function compareDates() {       
         var startDate = new Date(document.getElementById("MigraineStartTimestamp").value);
         var endDate = new Date(document.getElementById("MigraineEndTimestamp").value);

         var difference = endDate - startDate;
         var numberOfDays = Math.floor((difference)/(1000*60*60*24));

         if(numberOfDays>=7){
         	return true;

         }
         else{
         	alert("Please make sure the difference from Starting to Ending date is at least a week.")
            highlight("#MigraineStartTimestamp","#MigraineEndTimestamp");
         	return false;
         }       
}
   
</script>


<?php

	ini_set('display_errors', 'On');
	//Connects to the database
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu","ghiraldj-db","v1bptepGowZ4t1OE","ghiraldj-db");

	if($mysqli->connect_errno){
	  echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <title>Migraine Tracker</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<!-- Personal CSS -->
	<link rel="stylesheet" type="text/css" href="styles.css"/>

</head>

	<body>
		<!--Navigation menu bar-->
		<!--Citation: https://getbootstrap.com/components/#navbar-->
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<ul class="nav navbar-nav">
					<li><a href="home.php">Home</a></li>
					<li><a href="main.php?user=<?php echo $_GET['user'] ?>">Migraine Form</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Results<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li class="dropColor"><a href="mostCommonTriggers.php?user=<?php echo $_GET['user'] ?>">Most Common Triggers</a></li>
							<li class="dropColor"><a href="averageMigraineAttack.php?user=<?php echo $_GET['user'] ?>">Average Migraine Attack</a></li>
							<li class="dropColor"><a href="averageMigraineDuration.php?user=<?php echo $_GET['user'] ?>">Average Migraine Duration</a></li>
							<li class="dropColor"><a href="averageMigraineIntensity.php?user=<?php echo $_GET['user'] ?>">Average Migraine Intensity</a></li>
							<li class="dropColor"><a href="allMigraineRecords.php?user=<?php echo $_GET['user'] ?>">All Migraine Records</a></li>							
						</ul>
					</li>							
				</ul>

				<ul class="nav navbar-nav navbar-right">
           			<li><a href="landing.html">Logout</a></li>
       			</ul>
			</div>
		</nav>

		<div class="resultBoxesStyle">
			<h2>All Migraine Records Form</h2>
				<form class="form-horizontal" role="form" name="migraineForm" method="post" onsubmit="return compareDates()">

						<h3 id="user"> Welcome <?php echo $_GET['user'] ?>! </h3>			
						<!-- 
								Set UserScreenName to value from GET (in url) and hide form, 
								we should do this for the rest of the result pages 
						--> 
						<label hidden class="labelStyle" for="text">UserScreenName:</label>					
						<input hidden type="text" name="UserScreenName" id="UserScreenName" value="<?php echo $_GET['user'] ?>"><br>	
				
						Please enter dates in the following format YYYY-MM-DD HH::MM:SS. For example, 2017-07-02 14::35:10
						<br>


						<label class="labelStyle" for="text">Migraine Start Date and Time:</label>
						<input type="datetime" name="MigraineStartTimestamp" id="MigraineStartTimestamp"> 
						<br>

						<label class="labelStyle" for="text">Migraine End Date and Time:</label>
						 <input type="datetime" name="MigraineEndTimestamp" id="MigraineEndTimestamp">
						<br>
					<div class="buttonAlign">
						<input type="reset" class="rButtonStyle" id="rDataCancel" value="Cancel">
						<button type="submit" class="rButtonStyle" id="rDataSubmit" value="Add Migraine Data">Submit</button>
					</div>
				</form>
		</div>
		<br>
		<div class="resultBoxesStyle2">
					<h2>Delete Migraine Record</h2>
					<form class="form-horizontal" role="form" name="migraineForm" method="post">
						<label class="labelStyle" for="text">Please select an ID number</label>
						<input type="number" id="deleteID" name="deleteID"><br>

						<!--
						<label class="labelStyle" for="text">Please select an ID number</label>
						<select name="deleteID" style="width:50px">						
						-->

						<?php							
							if( isset($_POST['deleteID']) ){															
								$id = ($_POST['deleteID']);
								
								$del = "DELETE FROM Migraine WHERE MigraineID = '$id';";
								if(!($stmt = $mysqli->prepare( $del ))){
									echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
								}
								if(!$stmt->execute()){
									echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
								}												
								$stmt->close();					
								
								$del = "DELETE FROM HasFoodTriggers Where MigraineID = '$id';";
								if(!($stmt = $mysqli->prepare( $del ))){
									echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
								}
								if(!$stmt->execute()){
									echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
								}												
								$stmt->close();					
								
								$del = "DELETE FROM HasSensoryTriggers Where MigraineID = '$id';";
								if(!($stmt = $mysqli->prepare( $del ))){
									echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
								}
								if(!$stmt->execute()){
									echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
								}												
								$stmt->close();					
								
								$del = "DELETE FROM HasFoodTriggers Where MigraineID = 'NULL';";
								if(!($stmt = $mysqli->prepare( $del ))){
									echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
								}
								if(!$stmt->execute()){
									echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
								}												
								$stmt->close();					
								
								$del = "DELETE FROM HasSensoryTriggers Where MigraineID = 'NULL';";								
								if(!($stmt = $mysqli->prepare( $del ))){
									echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
								}
								if(!$stmt->execute()){
									echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
								}												
								$stmt->close();													
							}
						?>

						</select>

						<div class="buttonAlign">
							<input type="reset" class="rButtonStyle" id="rDataCancel" value="Cancel">
							<!-- <button type="submit" class="rButtonStyle" id="rDataSubmit" value="Add Migraine Data">Submit</button> -->
							<button type="submit" class="rButtonStyle" id="rDataDelete" value="Remove Migraine Data">Delete</button>
						</div>
					</form>
		</div>

		<div class="container-fluid text-center" id="triggerDiv">
			<table class="table" id="triggersTable" align="center">
				<div class="container-fluid text-center">
					<h2 id="triggerName">All Migraine Records</h2>
				</div>

				<tr>
					<th class="thStyle">Migraine ID</th>
					<th class="thStyle">Start Timestamp</th>
					<th class="thStyle">End Timestamp</th>
					<th class="thStyle">Migraine Intensity ID</th>
					<th class="thStyle">Hormone Trigger Value</th>
					<th class="thStyle">Water Intake Trigger Value</th>
					<th class="thStyle">Stress Trigger Value</th>
					<th class="thStyle">Physical Activity Trigger Value</th>
					<th class="thStyle">Sleep Trigger Value</th>
					<th class="thStyle">Food Trigger Value</th>
					<th class="thStyle">Sensory Trigger Value</th>
				</tr>
				
					<!-- MySqli statements for filling table -->
				
					<?php
					
						if( isset($_POST['MigraineStartTimestamp']) &&  isset($_POST['MigraineEndTimestamp']) ){
							
							$user = $_POST['UserScreenName'];	  
							$start = $_POST['MigraineStartTimestamp'];
							$end = $_POST['MigraineEndTimestamp'];			  
					  
							if(!($stmt = $mysqli->prepare(
								"						
								SELECT  tabl1.MigraineID, tabl1.MigraineStartTImestamp, tabl1.MigraineEndTImestamp, tabl1.MigraineIntensityID, table11.HormoneTriggerValue, table12.WaterIntakeTriggerValue, table13.StressTriggerValue, table14.PhysicalActivityTriggerValue, table15.SleepTriggerValue, table16.FoodTriggerItem, table17.SensoryTriggerValue
								FROM
								(

								 SELECT MigraineID, MigraineStartTImestamp, MigraineEndTImestamp, MigraineIntensityID, SleepTriggerID, WaterIntakeTriggerID, StressTriggerID, PhysicalActivityTriggerID,HormoneTriggerID  FROM

								(SELECT table1.UserID as UserID, table2.MigraineID as MigraineID,  table2.MigraineStartTImestamp as MigraineStartTImestamp, table2.MigraineEndTImestamp as MigraineEndTImestamp,  table2.MigraineIntensityID as MigraineIntensityID, table2.WaterIntakeTriggerID as WaterIntakeTriggerID, table2.StressTriggerID as StressTriggerID, table2.PhysicalActivityTriggerID as PhysicalActivityTriggerID, table2.SleepTriggerID as SleepTriggerID, table2.HormoneTriggerID as HormoneTriggerID 

								FROM 
								(select UserID FROM Users where UserScreenName = '$user' ) as table1

								LEFT JOIN 
								(select MigraineID, UserID, MigraineStartTImestamp, MigraineEndTImestamp, MigraineIntensityID, WaterIntakeTriggerID, StressTriggerID, PhysicalActivityTriggerID, SleepTriggerID, HormoneTriggerID from Migraine ) as table2 
								ON table1.UserID = table2.UserID WHERE MigraineStartTImestamp >= '$start' AND MigraineStartTImestamp <= '$end'
								) as tablle3) as tabl1

								LEFT JOIN
								(select HormoneTriggerID as HormoneTriggerID, HormoneTriggerValue as HormoneTriggerValue from HormoneTrigger ) as table11
								ON tabl1.HormoneTriggerID = table11.HormoneTriggerID 


								LEFT JOIN
								(select WaterIntakeTriggerID as WaterIntakeTriggerID, WaterIntakeTriggerValue as WaterIntakeTriggerValue from WaterIntakeTrigger) as table12
								ON tabl1.WaterIntakeTriggerID = table12.WaterIntakeTriggerID 


								LEFT JOIN
								(select StressTriggerID as StressTriggerID, StressTriggerValue as StressTriggerValue from StressTrigger ) as table13
								ON tabl1.StressTriggerID = table13.StressTriggerID 

								LEFT JOIN
								(select PhysicalActivityTriggerID as PhysicalActivityTriggerID, PhysicalActivityTriggerValue as PhysicalActivityTriggerValue from PhysicalActivityTrigger) as table14
								ON tabl1.PhysicalActivityTriggerID = table14.PhysicalActivityTriggerID 

								LEFT JOIN
								(select SleepTriggerID as SleepTriggerID, SleepTriggerValue as SleepTriggerValue from SleepTrigger) as table15
								ON tabl1.SleepTriggerID = table15.SleepTriggerID 

								LEFT JOIN
								(select MigraineID, FoodTriggerItem
								FROM
								(SELECT tab2.MigraineID as MigraineID, GROUP_CONCAT(FoodTriggerItem SEPARATOR ' ,  ') as FoodTriggerItem  
								FROM 
								(select tab3.MigraineID as MigraineID, tab4.FoodTriggerItem as FoodTriggerItem FROM
								(select FoodTriggerID, MigraineID FROM HasFoodTriggers) as tab3
								LEFT JOIN 
								(select FoodTriggerID as FoodTriggerID, FoodTriggerItem as FoodTriggerItem from FoodDrinkTrigger) as tab4
								ON tab3.FoodTriggerID = tab4.FoodTriggerID) as tab2 GROUP BY MigraineID) as tab4 ) as table16
								ON tabl1.MigraineID = table16.MigraineID 

								LEFT JOIN
								(select MigraineID, SensoryTriggerValue
								FROM
								(SELECT tab5.MigraineID as MigraineID,  GROUP_CONCAT(SensoryTriggerValue SEPARATOR ' ,  ') as SensoryTriggerValue 
								FROM 
								(select tab6.MigraineID as MigraineID, tab7.SensoryTriggerValue as SensoryTriggerValue FROM
								(select SensoryTriggerID, MigraineID FROM HasSensoryTriggers) as tab6
								LEFT JOIN 
								(select SensoryTriggerID as SensoryTriggerID, SensoryTriggerValue as SensoryTriggerValue from SensoryTrigger) as tab7
								ON tab6.SensoryTriggerID = tab7.SensoryTriggerID) as tab5 GROUP BY MigraineID) as tab7 ) as table17
								ON tabl1.MigraineID = table17.MigraineID
								" 
								))){
								echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
							}
						  
							if(!$stmt->execute()){
								echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
							}
							
							if(!$stmt->bind_result( 
																$MigraineID, $MigraineStartTImestamp, $MigraineEndTImestamp, 
																$MigraineIntensityID, $HormoneTriggerValue, $WaterIntakeTriggerValue, 
																$StressTriggerValue, $PhysicalActivityTriggerValue, $SleepTriggerValue, 
																$FoodTriggerItem, $SensoryTriggerValue 
																)){
								echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
							}
						  
							while($stmt->fetch()){
								echo "<tr>\n<td>\n" . $MigraineID . "\n</td>\n<td>\n" . $MigraineStartTImestamp . "\n</td>\n<td>\n" . $MigraineEndTImestamp . "\n</td>\n<td>\n" .
										 $MigraineIntensityID . "\n</td>\n<td>\n" . $HormoneTriggerValue . "\n</td>\n<td>\n" . $WaterIntakeTriggerValue . "\n</td>\n<td>\n" .
										 $StressTriggerValue . "\n</td>\n<td>\n" . $PhysicalActivityTriggerValue . "\n</td>\n<td>\n" . $SleepTriggerValue . "\n</td>\n<td>\n" .
										 $FoodTriggerItem . "\n</td>\n<td>\n" . $SensoryTriggerValue . "\n</td>\n<tr>\n";
							}

							$stmt->close();
						}
					?>
			</table>
		</div>		
	</body>
</html>
