<script>
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

	<!-- Bootstrap -->
	<link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">

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
					<li><a href="main.php">Migraine Form</a></li>
					<li><a href="results.php">Results</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
           			<li><a href="landing.html">Logout</a></li>
       			</ul>
			</div>
		</nav>

		<div class="formStyle">
			<h2>Most Common Triggers</h2>
				<form class="form-horizontal" role="form" name="migraineForm" method="post" onsubmit="return compareDates()">
			

						<label class="labelStyle" for="text">UserScreenName:</label>					
						<input type="text" name="UserScreenName" id="UserScreenName" ><br>	
						<br>
				
						Please enter dates in the following format YYYY-MM-DD HH::MM:SS. For example, 2017-07-02 14::35:10
						<br>


						<label class="labelStyle" for="text">Migraine Start Date and Time:</label>
						<input type="datetime" name="MigraineStartTimestamp" id="MigraineStartTimestamp"> 
						<br>

						<label class="labelStyle" for="text">Migraine End Date and Time:</label>
						 <input type="datetime" name="MigraineEndTimestamp" id="MigraineEndTimestamp">
						<br>
					<div class="buttonAlign">
						<button type="button"" class="buttonStyle" id="migraineDataCancel" onclick="window.location='landing.html'">Cancel</button>
						<button type="submit" class="buttonStyle" id="migraineDataSubmit" value="Add Migraine Data" onclick="window.location='results.php'">Submit</button>
					</div>
				</form>

			<h2>Average Migraine Attack</h2>
				<form class="form-horizontal" role="form" name="migraineForm" method="post" onsubmit="return compareDates()">

						<label class="labelStyle" for="text">UserScreenName:</label>					
						<input type="text" name="UserScreenName" id="UserScreenName" ><br>	
						<br>
				
						Please enter dates in the following format YYYY-MM-DD HH::MM:SS. For example, 2017-07-02 14::35:10
						<br>


						<label class="labelStyle" for="text">Migraine Start Date and Time:</label>
						<input type="datetime" name="MigraineStartTimestamp" id="MigraineStartTimestamp"> 
						<br>

						<label class="labelStyle" for="text">Migraine End Date and Time:</label>
						 <input type="datetime" name="MigraineEndTimestamp" id="MigraineEndTimestamp">
						<br>
					<div class="buttonAlign">
						<button type="button"" class="buttonStyle" id="migraineDataCancel" onclick="window.location='landing.html'">Cancel</button>
						<button type="submit" class="buttonStyle" id="migraineDataSubmit" value="Add Migraine Data" onclick="window.location='results.php'">Submit</button>
					</div>
				</form>

			
			<h2>Average Migraine Duration</h2>
				<form class="form-horizontal" role="form" name="migraineForm" method="post" onsubmit="return compareDates()">
						<label class="labelStyle" for="text">UserScreenName:</label>					
						<input type="text" name="UserScreenName" id="UserScreenName" ><br>	
						<br>
				
						Please enter dates in the following format YYYY-MM-DD HH::MM:SS. For example, 2017-07-02 14::35:10
						<br>


						<label class="labelStyle" for="text">Migraine Start Date and Time:</label>
						<input type="datetime" name="MigraineStartTimestamp" id="MigraineStartTimestamp"> 
						<br>

						<label class="labelStyle" for="text">Migraine End Date and Time:</label>
						 <input type="datetime" name="MigraineEndTimestamp" id="MigraineEndTimestamp">
						<br>
					<div class="buttonAlign">
						<button type="button"" class="buttonStyle" id="migraineDataCancel" onclick="window.location='landing.html'">Cancel</button>
						<button type="submit" class="buttonStyle" id="migraineDataSubmit" value="Add Migraine Data" onclick="window.location='results.php'">Submit</button>
					</div>
				</form>

			<h2>Average Migraine Intensity</h2>
				<form class="form-horizontal" role="form" name="migraineForm" method="post" onsubmit="return compareDates()">
						<label class="labelStyle" for="text">UserScreenName:</label>					
						<input type="text" name="UserScreenName" id="UserScreenName" ><br>	
						<br>
				
						Please enter dates in the following format YYYY-MM-DD HH::MM:SS. For example, 2017-07-02 14::35:10
						<br>


						<label class="labelStyle" for="text">Migraine Start Date and Time:</label>
						<input type="datetime" name="MigraineStartTimestamp" id="MigraineStartTimestamp"> 
						<br>

						<label class="labelStyle" for="text">Migraine End Date and Time:</label>
						 <input type="datetime" name="MigraineEndTimestamp" id="MigraineEndTimestamp">
						<br>
					<div class="buttonAlign">
						<button type="button"" class="buttonStyle" id="migraineDataCancel" onclick="window.location='landing.html'">Cancel</button>
						<button type="submit" class="buttonStyle" id="migraineDataSubmit" value="Add Migraine Data" onclick="window.location='results.php'">Submit</button>
					</div>
				</form>
		</div>

		<div class="container-fluid text-center" id="triggerDiv">
			<table class="table" id="triggersTable" align="center">
				<div class="container-fluid text-center">
					<h2 id="triggerName">Most Common Triggers</h2>
				</div>

			<tr>
				<th class="thStyle">Trigger</th>
				<th class="thStyle">Number of Triggers</th>
				<th class="thStyle">Number of Migraines</th>
				<th class="thStyle">Percentage</th>
			</tr>
			
			<!-- MySqli statements for filling table -->
		
			<?php
				if( isset($_POST['UserScreenName']) ){
					
					$user = $_POST['UserScreenName'];	  
					$start = $_POST['MigraineStartTimestamp'];
					$end = $_POST['MigraineEndTimestamp'];			  
			  
					if(!($stmt = $mysqli->prepare(
						"
						SELECT CONCAT('Low Water Intake Related Trigger (below 1.5 liters)' ) as Triggers, 
						SUM(tablle2.NumberWaterIntakeTriggerValue ) as NumberofTriggers, 
						tablle4.NumberOfMigraines as NumberOfMigraines,  
						ROUND(((SUM(tablle2.NumberWaterIntakeTriggerValue ) / tablle4.NumberOfMigraines) * 100),0) as Percentage
						
						FROM
						(SELECT WaterIntakeTriggerValue, count(WaterIntakeTriggerValue) AS NumberWaterIntakeTriggerValue, MigraineID
						FROM
						(select table10.MigraineID, table12.WaterIntakeTriggerValue as WaterIntakeTriggerValue
						, table13.StressTriggerValue , table14.PhysicalActivityTriggerValue, table11.HormoneTriggerValue as HormoneTriggerValue, table16.FoodTriggerItem
						FROM 
						(SELECT table1.UserID as UserID, table2.MigraineID as MigraineID, table2.MigraineIntensityID as MigraineIntensityID, table2.WaterIntakeTriggerID as WaterIntakeTriggerID, table2.StressTriggerID as StressTriggerID, table2.PhysicalActivityTriggerID as PhysicalActivityTriggerID, table2.SleepTriggerID as SleepTriggerID, table2.HormoneTriggerID as HormoneTriggerID 

						FROM 
						(select UserID FROM Users where UserScreenName = '$user' ) as table1

						LEFT JOIN 
						(select MigraineID, UserID, MigraineStartTImestamp, MigraineEndTImestamp MigraineIntensityID, WaterIntakeTriggerID, StressTriggerID, PhysicalActivityTriggerID, SleepTriggerID, HormoneTriggerID from Migraine ) as table2 
						ON table1.UserID = table2.UserID WHERE MigraineStartTImestamp >= '$start' AND MigraineStartTImestamp <= '$end') as table10

						LEFT JOIN
						(select HormoneTriggerID as HormoneTriggerID, HormoneTriggerValue as HormoneTriggerValue from HormoneTrigger where HormoneTriggerID = 1 ) as table11
						ON table10.HormoneTriggerID = table11.HormoneTriggerID 

						LEFT JOIN
						(select WaterIntakeTriggerID as WaterIntakeTriggerID, WaterIntakeTriggerValue as WaterIntakeTriggerValue from WaterIntakeTrigger where WaterIntakeTriggerID <= 3) as table12
						ON table10.WaterIntakeTriggerID = table12.WaterIntakeTriggerID 

						LEFT JOIN
						(select StressTriggerID as StressTriggerID, StressTriggerValue as StressTriggerValue from StressTrigger where StressTriggerID >=2 ) as table13
						ON table10.StressTriggerID = table13.StressTriggerID 

						LEFT JOIN
						(select PhysicalActivityTriggerID as PhysicalActivityTriggerID, PhysicalActivityTriggerValue as PhysicalActivityTriggerValue from PhysicalActivityTrigger where PhysicalActivityTriggerID >= 4) as table14
						ON table10.PhysicalActivityTriggerID = table14.PhysicalActivityTriggerID 

						LEFT JOIN
						(select SleepTriggerID as SleepTriggerID, SleepTriggerValue as SleepTriggerValue from SleepTrigger where SleepTriggerID <= 3) as table15
						ON table10.SleepTriggerID = table15.SleepTriggerID 




						LEFT JOIN
						(select MigraineID, FoodTriggerItem
						FROM
						(SELECT tab2.MigraineID as MigraineID,  GROUP_CONCAT(FoodTriggerItem SEPARATOR ' ,  ') as FoodTriggerItem 
						FROM 
						(select tab3.MigraineID as MigraineID, tab4.FoodTriggerItem as FoodTriggerItem FROM
						(select FoodTriggerID, MigraineID FROM HasFoodTriggers) as tab3
						LEFT JOIN 
						(select FoodTriggerID as FoodTriggerID, FoodTriggerItem as FoodTriggerItem from FoodDrinkTrigger) as tab4
						ON tab3.FoodTriggerID = tab4.FoodTriggerID) as tab2 GROUP BY MigraineID) as tab4 ) as table16
						ON table10.MigraineID = table16.MigraineID 



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
						ON table10.MigraineID = table17.MigraineID 
						 ) as tablle GROUP BY WaterIntakeTriggerValue) as tablle2


						JOIN
						(SELECT count(distinct(MigraineID)) as NumberOfMigraines
						FROM
						(SELECT table1.UserID as UserID, table2.MigraineID as MigraineID, table2.MigraineIntensityID as MigraineIntensityID, table2.WaterIntakeTriggerID as WaterIntakeTriggerID, table2.StressTriggerID as StressTriggerID, table2.PhysicalActivityTriggerID as PhysicalActivityTriggerID, table2.SleepTriggerID as SleepTriggerID, table2.HormoneTriggerID as HormoneTriggerID 

						-- GIVEN USER 
						FROM 
						(select UserID FROM Users where UserScreenName = '$user' ) as table1

						-- GIVEN DATES 
						LEFT JOIN 
						(select MigraineID, UserID, MigraineStartTImestamp, MigraineEndTImestamp MigraineIntensityID, WaterIntakeTriggerID, StressTriggerID, PhysicalActivityTriggerID, SleepTriggerID, HormoneTriggerID from Migraine ) as table2 
						ON table1.UserID = table2.UserID WHERE MigraineStartTImestamp >= '$start' AND MigraineStartTImestamp <= '$end') as tablle3) as tablle4







						UNION ALL

						SELECT CONCAT('Stress Related Trigger (moderate or extreme)' ) as StressTrigger, 
						SUM(tablle2.NumberStressTriggerValue ) as NumberofStressTriggerValue, 
						tablle4.NumberOfMigraines as NumberOfMigraines,  
						ROUND(((SUM(tablle2.NumberStressTriggerValue ) / tablle4.NumberOfMigraines) * 100),0) as Percentage
						
						FROM
						(SELECT StressTriggerValue, count(StressTriggerValue) AS NumberStressTriggerValue, MigraineID
						FROM
						(select table10.MigraineID, table12.WaterIntakeTriggerValue as WaterIntakeTriggerValue
						, table13.StressTriggerValue  as StressTriggerValue, table14.PhysicalActivityTriggerValue, table11.HormoneTriggerValue as HormoneTriggerValue, table16.FoodTriggerItem
						FROM 
						(SELECT table1.UserID as UserID, table2.MigraineID as MigraineID, table2.MigraineIntensityID as MigraineIntensityID, table2.WaterIntakeTriggerID as WaterIntakeTriggerID, table2.StressTriggerID as StressTriggerID, table2.PhysicalActivityTriggerID as PhysicalActivityTriggerID, table2.SleepTriggerID as SleepTriggerID, table2.HormoneTriggerID as HormoneTriggerID 

						FROM 
						(select UserID FROM Users where UserScreenName = '$user' ) as table1

						LEFT JOIN 
						(select MigraineID, UserID, MigraineStartTImestamp, MigraineEndTImestamp MigraineIntensityID, WaterIntakeTriggerID, StressTriggerID, PhysicalActivityTriggerID, SleepTriggerID, HormoneTriggerID from Migraine ) as table2 
						ON table1.UserID = table2.UserID WHERE MigraineStartTImestamp >= '$start' AND MigraineStartTImestamp <= '$end') as table10

						LEFT JOIN
						(select HormoneTriggerID as HormoneTriggerID, HormoneTriggerValue as HormoneTriggerValue from HormoneTrigger where HormoneTriggerID = 1 ) as table11
						ON table10.HormoneTriggerID = table11.HormoneTriggerID 

						LEFT JOIN
						(select WaterIntakeTriggerID as WaterIntakeTriggerID, WaterIntakeTriggerValue as WaterIntakeTriggerValue from WaterIntakeTrigger where WaterIntakeTriggerID <= 3) as table12
						ON table10.WaterIntakeTriggerID = table12.WaterIntakeTriggerID 

						LEFT JOIN
						(select StressTriggerID as StressTriggerID, StressTriggerValue as StressTriggerValue from StressTrigger where StressTriggerID >=2 ) as table13
						ON table10.StressTriggerID = table13.StressTriggerID 

						LEFT JOIN
						(select PhysicalActivityTriggerID as PhysicalActivityTriggerID, PhysicalActivityTriggerValue as PhysicalActivityTriggerValue from PhysicalActivityTrigger where PhysicalActivityTriggerID >= 4) as table14
						ON table10.PhysicalActivityTriggerID = table14.PhysicalActivityTriggerID 

						LEFT JOIN
						(select SleepTriggerID as SleepTriggerID, SleepTriggerValue as SleepTriggerValue from SleepTrigger where SleepTriggerID <= 3) as table15
						ON table10.SleepTriggerID = table15.SleepTriggerID 




						LEFT JOIN
						(select MigraineID, FoodTriggerItem
						FROM
						(SELECT tab2.MigraineID as MigraineID,  GROUP_CONCAT(FoodTriggerItem SEPARATOR ' ,  ') as FoodTriggerItem 
						FROM 
						(select tab3.MigraineID as MigraineID, tab4.FoodTriggerItem as FoodTriggerItem FROM
						(select FoodTriggerID, MigraineID FROM HasFoodTriggers) as tab3
						LEFT JOIN 
						(select FoodTriggerID as FoodTriggerID, FoodTriggerItem as FoodTriggerItem from FoodDrinkTrigger) as tab4
						ON tab3.FoodTriggerID = tab4.FoodTriggerID) as tab2 GROUP BY MigraineID) as tab4 ) as table16
						ON table10.MigraineID = table16.MigraineID 



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
						ON table10.MigraineID = table17.MigraineID 
						 ) as tablle GROUP BY WaterIntakeTriggerValue) as tablle2


						JOIN
						(SELECT count(distinct(MigraineID)) as NumberOfMigraines
						FROM
						(SELECT table1.UserID as UserID, table2.MigraineID as MigraineID, table2.MigraineIntensityID as MigraineIntensityID, table2.WaterIntakeTriggerID as WaterIntakeTriggerID, table2.StressTriggerID as StressTriggerID, table2.PhysicalActivityTriggerID as PhysicalActivityTriggerID, table2.SleepTriggerID as SleepTriggerID, table2.HormoneTriggerID as HormoneTriggerID 

						FROM 
						(select UserID FROM Users where UserScreenName = '$user' ) as table1

						LEFT JOIN 
						(select MigraineID, UserID, MigraineStartTImestamp, MigraineEndTImestamp MigraineIntensityID, WaterIntakeTriggerID, StressTriggerID, PhysicalActivityTriggerID, SleepTriggerID, HormoneTriggerID from Migraine ) as table2 
						ON table1.UserID = table2.UserID WHERE MigraineStartTImestamp >= '$start' AND MigraineStartTImestamp <= '$end') as tablle3) as tablle4




						UNION ALL

						SELECT CONCAT('Exertion Related Trigger (moderate or extreme)' ) as PhysicalActivityTrigger, 
						SUM(tablle2.NumberPhysicalActivityTriggerValue ) as NumberofPhysicalActivityTriggerValue, 
						tablle4.NumberOfMigraines as NumberOfMigraines,  
						ROUND(((SUM(tablle2.NumberPhysicalActivityTriggerValue ) / tablle4.NumberOfMigraines) * 100),0) as Percentage
						
						
						FROM
						(SELECT PhysicalActivityTriggerValue, count(PhysicalActivityTriggerValue) AS NumberPhysicalActivityTriggerValue, MigraineID
						FROM
						(select table10.MigraineID, table12.WaterIntakeTriggerValue as WaterIntakeTriggerValue
						, table13.StressTriggerValue  as StressTriggerValue, table14.PhysicalActivityTriggerValue, table11.HormoneTriggerValue as HormoneTriggerValue, table16.FoodTriggerItem
						FROM 
						(SELECT table1.UserID as UserID, table2.MigraineID as MigraineID, table2.MigraineIntensityID as MigraineIntensityID, table2.WaterIntakeTriggerID as WaterIntakeTriggerID, table2.StressTriggerID as StressTriggerID, table2.PhysicalActivityTriggerID as PhysicalActivityTriggerID, table2.SleepTriggerID as SleepTriggerID, table2.HormoneTriggerID as HormoneTriggerID 

						FROM 
						(select UserID FROM Users where UserScreenName = '$user' ) as table1

						LEFT JOIN 
						(select MigraineID, UserID, MigraineStartTImestamp, MigraineEndTImestamp MigraineIntensityID, WaterIntakeTriggerID, StressTriggerID, PhysicalActivityTriggerID, SleepTriggerID, HormoneTriggerID from Migraine ) as table2 
						ON table1.UserID = table2.UserID WHERE MigraineStartTImestamp >= '$start' AND MigraineStartTImestamp <= '$end') as table10



						LEFT JOIN
						(select HormoneTriggerID as HormoneTriggerID, HormoneTriggerValue as HormoneTriggerValue from HormoneTrigger where HormoneTriggerID = 1 ) as table11
						ON table10.HormoneTriggerID = table11.HormoneTriggerID 

						LEFT JOIN
						(select WaterIntakeTriggerID as WaterIntakeTriggerID, WaterIntakeTriggerValue as WaterIntakeTriggerValue from WaterIntakeTrigger where WaterIntakeTriggerID <= 3) as table12
						ON table10.WaterIntakeTriggerID = table12.WaterIntakeTriggerID 

						LEFT JOIN
						(select StressTriggerID as StressTriggerID, StressTriggerValue as StressTriggerValue from StressTrigger where StressTriggerID >=2 ) as table13
						ON table10.StressTriggerID = table13.StressTriggerID 

						LEFT JOIN
						(select PhysicalActivityTriggerID as PhysicalActivityTriggerID, PhysicalActivityTriggerValue as PhysicalActivityTriggerValue from PhysicalActivityTrigger where PhysicalActivityTriggerID >= 4) as table14
						ON table10.PhysicalActivityTriggerID = table14.PhysicalActivityTriggerID 

						LEFT JOIN
						(select SleepTriggerID as SleepTriggerID, SleepTriggerValue as SleepTriggerValue from SleepTrigger where SleepTriggerID <= 3) as table15
						ON table10.SleepTriggerID = table15.SleepTriggerID 




						LEFT JOIN
						(select MigraineID, FoodTriggerItem
						FROM
						(SELECT tab2.MigraineID as MigraineID,  GROUP_CONCAT(FoodTriggerItem SEPARATOR ' ,  ') as FoodTriggerItem 
						FROM 
						(select tab3.MigraineID as MigraineID, tab4.FoodTriggerItem as FoodTriggerItem FROM
						(select FoodTriggerID, MigraineID FROM HasFoodTriggers) as tab3
						LEFT JOIN 
						(select FoodTriggerID as FoodTriggerID, FoodTriggerItem as FoodTriggerItem from FoodDrinkTrigger) as tab4
						ON tab3.FoodTriggerID = tab4.FoodTriggerID) as tab2 GROUP BY MigraineID) as tab4 ) as table16
						ON table10.MigraineID = table16.MigraineID 



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
						ON table10.MigraineID = table17.MigraineID 
						 ) as tablle GROUP BY WaterIntakeTriggerValue) as tablle2


						JOIN
						(SELECT count(distinct(MigraineID)) as NumberOfMigraines
						FROM
						(SELECT table1.UserID as UserID, table2.MigraineID as MigraineID, table2.MigraineIntensityID as MigraineIntensityID, table2.WaterIntakeTriggerID as WaterIntakeTriggerID, table2.StressTriggerID as StressTriggerID, table2.PhysicalActivityTriggerID as PhysicalActivityTriggerID, table2.SleepTriggerID as SleepTriggerID, table2.HormoneTriggerID as HormoneTriggerID 

						FROM 
						(select UserID FROM Users where UserScreenName = '$user' ) as table1

						LEFT JOIN 
						(select MigraineID, UserID, MigraineStartTImestamp, MigraineEndTImestamp MigraineIntensityID, WaterIntakeTriggerID, StressTriggerID, PhysicalActivityTriggerID, SleepTriggerID, HormoneTriggerID from Migraine ) as table2 
						ON table1.UserID = table2.UserID WHERE MigraineStartTImestamp >= '$start' AND MigraineStartTImestamp <= '$end') as tablle3) as tablle4






						UNION ALL

						SELECT CONCAT('Hormone Related Trigger (menstruation)' ) as HormoneTrigger, 
						SUM(tablle2.NumberHormoneTriggerValue ) as NumberofHormoneTriggerValue, 
						tablle4.NumberOfMigraines as NumberOfMigraines,  
						ROUND(((SUM(tablle2.NumberHormoneTriggerValue ) / tablle4.NumberOfMigraines) * 100),0) as Percentage
						
						
						FROM
						(SELECT HormoneTriggerValue, count(HormoneTriggerValue) AS NumberHormoneTriggerValue, MigraineID
						FROM
						(select table10.MigraineID, table12.WaterIntakeTriggerValue as WaterIntakeTriggerValue
						, table13.StressTriggerValue  as StressTriggerValue, table14.PhysicalActivityTriggerValue AS PhysicalActivityTriggerValue, table11.HormoneTriggerValue as HormoneTriggerValue, table16.FoodTriggerItem
						FROM 
						(SELECT table1.UserID as UserID, table2.MigraineID as MigraineID, table2.MigraineIntensityID as MigraineIntensityID, table2.WaterIntakeTriggerID as WaterIntakeTriggerID, table2.StressTriggerID as StressTriggerID, table2.PhysicalActivityTriggerID as PhysicalActivityTriggerID, table2.SleepTriggerID as SleepTriggerID, table2.HormoneTriggerID as HormoneTriggerID 

						FROM 
						(select UserID FROM Users where UserScreenName = '$user' ) as table1

						LEFT JOIN 
						(select MigraineID, UserID, MigraineStartTImestamp, MigraineEndTImestamp MigraineIntensityID, WaterIntakeTriggerID, StressTriggerID, PhysicalActivityTriggerID, SleepTriggerID, HormoneTriggerID from Migraine ) as table2 
						ON table1.UserID = table2.UserID WHERE MigraineStartTImestamp >= '$start' AND MigraineStartTImestamp <= '$end') as table10



						LEFT JOIN
						(select HormoneTriggerID as HormoneTriggerID, HormoneTriggerValue as HormoneTriggerValue from HormoneTrigger where HormoneTriggerID = 1 ) as table11
						ON table10.HormoneTriggerID = table11.HormoneTriggerID 

						LEFT JOIN
						(select WaterIntakeTriggerID as WaterIntakeTriggerID, WaterIntakeTriggerValue as WaterIntakeTriggerValue from WaterIntakeTrigger where WaterIntakeTriggerID <= 3) as table12
						ON table10.WaterIntakeTriggerID = table12.WaterIntakeTriggerID 

						LEFT JOIN
						(select StressTriggerID as StressTriggerID, StressTriggerValue as StressTriggerValue from StressTrigger where StressTriggerID >=2 ) as table13
						ON table10.StressTriggerID = table13.StressTriggerID 

						LEFT JOIN
						(select PhysicalActivityTriggerID as PhysicalActivityTriggerID, PhysicalActivityTriggerValue as PhysicalActivityTriggerValue from PhysicalActivityTrigger where PhysicalActivityTriggerID >= 4) as table14
						ON table10.PhysicalActivityTriggerID = table14.PhysicalActivityTriggerID 

						LEFT JOIN
						(select SleepTriggerID as SleepTriggerID, SleepTriggerValue as SleepTriggerValue from SleepTrigger where SleepTriggerID <= 3) as table15
						ON table10.SleepTriggerID = table15.SleepTriggerID 




						LEFT JOIN
						(select MigraineID, FoodTriggerItem
						FROM
						(SELECT tab2.MigraineID as MigraineID,  GROUP_CONCAT(FoodTriggerItem SEPARATOR ' ,  ') as FoodTriggerItem 
						FROM 
						(select tab3.MigraineID as MigraineID, tab4.FoodTriggerItem as FoodTriggerItem FROM
						(select FoodTriggerID, MigraineID FROM HasFoodTriggers) as tab3
						LEFT JOIN 
						(select FoodTriggerID as FoodTriggerID, FoodTriggerItem as FoodTriggerItem from FoodDrinkTrigger) as tab4
						ON tab3.FoodTriggerID = tab4.FoodTriggerID) as tab2 GROUP BY MigraineID) as tab4 ) as table16
						ON table10.MigraineID = table16.MigraineID 



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
						ON table10.MigraineID = table17.MigraineID 
						 ) as tablle GROUP BY WaterIntakeTriggerValue) as tablle2


						JOIN
						(SELECT count(distinct(MigraineID)) as NumberOfMigraines
						FROM
						(SELECT table1.UserID as UserID, table2.MigraineID as MigraineID, table2.MigraineIntensityID as MigraineIntensityID, table2.WaterIntakeTriggerID as WaterIntakeTriggerID, table2.StressTriggerID as StressTriggerID, table2.PhysicalActivityTriggerID as PhysicalActivityTriggerID, table2.SleepTriggerID as SleepTriggerID, table2.HormoneTriggerID as HormoneTriggerID 

						FROM 
						(select UserID FROM Users where UserScreenName = '$user' ) as table1

						LEFT JOIN 
						(select MigraineID, UserID, MigraineStartTImestamp, MigraineEndTImestamp MigraineIntensityID, WaterIntakeTriggerID, StressTriggerID, PhysicalActivityTriggerID, SleepTriggerID, HormoneTriggerID from Migraine ) as table2 
						ON table1.UserID = table2.UserID WHERE MigraineStartTImestamp >= '$start' AND MigraineStartTImestamp <= '$end') as tablle3) as tablle4






						UNION ALL

						SELECT CONCAT('Sleep Related Trigger (less than 6 hours)' ) as SleepTrigger, 
						SUM(tablle2.NumberSleepTriggerValue ) as NumberofSleepTriggerValue, 
						tablle4.NumberOfMigraines as NumberOfMigraines,  
						ROUND(((SUM(tablle2.NumberSleepTriggerValue ) / tablle4.NumberOfMigraines) * 100),0) as Percentage
						
						
						FROM
						(SELECT SleepTriggerValue, count(SleepTriggerValue) AS NumberSleepTriggerValue, MigraineID
						FROM
						(select table10.MigraineID, table12.WaterIntakeTriggerValue as WaterIntakeTriggerValue
						, table13.StressTriggerValue  as StressTriggerValue, table14.PhysicalActivityTriggerValue AS PhysicalActivityTriggerValue, table11.HormoneTriggerValue as HormoneTriggerValue, table16.FoodTriggerItem, table15.SleepTriggerValue
						FROM 
						(SELECT table1.UserID as UserID, table2.MigraineID as MigraineID, table2.MigraineIntensityID as MigraineIntensityID, table2.WaterIntakeTriggerID as WaterIntakeTriggerID, table2.StressTriggerID as StressTriggerID, table2.PhysicalActivityTriggerID as PhysicalActivityTriggerID, table2.SleepTriggerID as SleepTriggerID, table2.HormoneTriggerID as HormoneTriggerID 

						FROM 
						(select UserID FROM Users where UserScreenName = '$user' ) as table1

						LEFT JOIN 
						(select MigraineID, UserID, MigraineStartTImestamp, MigraineEndTImestamp MigraineIntensityID, WaterIntakeTriggerID, StressTriggerID, PhysicalActivityTriggerID, SleepTriggerID, HormoneTriggerID from Migraine ) as table2 
						ON table1.UserID = table2.UserID WHERE MigraineStartTImestamp >= '$start' AND MigraineStartTImestamp <= '$end') as table10


						LEFT JOIN
						(select HormoneTriggerID as HormoneTriggerID, HormoneTriggerValue as HormoneTriggerValue from HormoneTrigger where HormoneTriggerID = 1 ) as table11
						ON table10.HormoneTriggerID = table11.HormoneTriggerID 

						LEFT JOIN
						(select WaterIntakeTriggerID as WaterIntakeTriggerID, WaterIntakeTriggerValue as WaterIntakeTriggerValue from WaterIntakeTrigger where WaterIntakeTriggerID <= 3) as table12
						ON table10.WaterIntakeTriggerID = table12.WaterIntakeTriggerID 

						LEFT JOIN
						(select StressTriggerID as StressTriggerID, StressTriggerValue as StressTriggerValue from StressTrigger where StressTriggerID >=2 ) as table13
						ON table10.StressTriggerID = table13.StressTriggerID 

						LEFT JOIN
						(select PhysicalActivityTriggerID as PhysicalActivityTriggerID, PhysicalActivityTriggerValue as PhysicalActivityTriggerValue from PhysicalActivityTrigger where PhysicalActivityTriggerID >= 4) as table14
						ON table10.PhysicalActivityTriggerID = table14.PhysicalActivityTriggerID 

						LEFT JOIN
						(select SleepTriggerID as SleepTriggerID, SleepTriggerValue as SleepTriggerValue from SleepTrigger where SleepTriggerID <= 3) as table15
						ON table10.SleepTriggerID = table15.SleepTriggerID 




						LEFT JOIN
						(select MigraineID, FoodTriggerItem
						FROM
						(SELECT tab2.MigraineID as MigraineID,  GROUP_CONCAT(FoodTriggerItem SEPARATOR ' ,  ') as FoodTriggerItem 
						FROM 
						(select tab3.MigraineID as MigraineID, tab4.FoodTriggerItem as FoodTriggerItem FROM
						(select FoodTriggerID, MigraineID FROM HasFoodTriggers) as tab3
						LEFT JOIN 
						(select FoodTriggerID as FoodTriggerID, FoodTriggerItem as FoodTriggerItem from FoodDrinkTrigger) as tab4
						ON tab3.FoodTriggerID = tab4.FoodTriggerID) as tab2 GROUP BY MigraineID) as tab4 ) as table16
						ON table10.MigraineID = table16.MigraineID 



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
						ON table10.MigraineID = table17.MigraineID 
						 ) as tablle GROUP BY WaterIntakeTriggerValue) as tablle2


						JOIN
						(SELECT count(distinct(MigraineID)) as NumberOfMigraines
						FROM
						(SELECT table1.UserID as UserID, table2.MigraineID as MigraineID, table2.MigraineIntensityID as MigraineIntensityID, table2.WaterIntakeTriggerID as WaterIntakeTriggerID, table2.StressTriggerID as StressTriggerID, table2.PhysicalActivityTriggerID as PhysicalActivityTriggerID, table2.SleepTriggerID as SleepTriggerID, table2.HormoneTriggerID as HormoneTriggerID 

						FROM 
						(select UserID FROM Users where UserScreenName = '$user' ) as table1

						LEFT JOIN 
						(select MigraineID, UserID, MigraineStartTImestamp, MigraineEndTImestamp MigraineIntensityID, WaterIntakeTriggerID, StressTriggerID, PhysicalActivityTriggerID, SleepTriggerID, HormoneTriggerID from Migraine ) as table2 
						ON table1.UserID = table2.UserID WHERE MigraineStartTImestamp >= '$start' AND MigraineStartTImestamp <= '$end') as tablle3) as tablle4

						ORDER BY PERCENTAGE DESC

						" 
						))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}
				  
					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					
					if(!$stmt->bind_result($Triggers, $NumberofTriggers, $NumberOfMigraines, $Percentage
						)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
				  
					while($stmt->fetch()){
						echo "<tr>\n<td>\n" . $Triggers . "\n</td>\n<td>\n" . $NumberofTriggers . "\n</td>\n<td>\n" . $NumberOfMigraines . "\n</td>\n<td>\n" . $Percentage . "\n</td>\n<tr>\n";
					}

					$stmt->close();
				}
			?>
			</table>
		</div>		
	</body>
</html>