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
			<h2>Average Migraine Intensity Form</h2>
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

		<div class="container-fluid text-center" id="triggerDiv">
			<table class="table" id="triggersTable" align="center">
				<div class="container-fluid text-center">
					<h2 id="triggerName">Average Migraine Intensity Result</h2>
				</div>

			<tr>
				<th class="thStyle">Average Migraine Intensity</th>
			</tr>
			
			<!-- MySqli statements for filling table -->
		
			<?php
				if( isset($_POST['MigraineStartTimestamp']) &&  isset($_POST['MigraineEndTimestamp']) ){
					
					$user = $_POST['UserScreenName'];	  
					$start = $_POST['MigraineStartTimestamp'];
					$end = $_POST['MigraineEndTimestamp'];			  
			  
					if(!($stmt = $mysqli->prepare(
						"
						SELECT ROUND( ( SUM(MigraineIntensityID )) / (count(distinct(MigraineID))) , 0)  as averageMigraineIntensity
						FROM
						(SELECT table1.UserID as UserID, 
										table2.MigraineID as MigraineID, 
										table2.MigraineIntensityID as MigraineIntensityID,
										table2.WaterIntakeTriggerID as WaterIntakeTriggerID, 
										table2.StressTriggerID as StressTriggerID,
										table2.PhysicalActivityTriggerID as PhysicalActivityTriggerID, 
										table2.SleepTriggerID as SleepTriggerID, 
										table2.HormoneTriggerID as HormoneTriggerID 

						-- GIVEN USER 
						FROM 
						(SELECT UserID FROM Users where UserScreenName = '$user' ) as table1

						-- GIVEN DATES 
						LEFT JOIN 
						(SELECT MigraineID, 
									UserID,
									MigraineStartTImestamp, 
									MigraineEndTImestamp, 
									MigraineIntensityID, 
									WaterIntakeTriggerID, 
									StressTriggerID, 
									PhysicalActivityTriggerID,
									SleepTriggerID, 
									HormoneTriggerID from Migraine ) as table2 
						ON table1.UserID = table2.UserID WHERE MigraineStartTImestamp >= '$start' AND MigraineStartTImestamp <= '$end') as tablle3


						" 
						))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}
				  
					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					
					if(!$stmt->bind_result($averageMigraineIntensity)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
				  
					while($stmt->fetch()){
						echo "<tr>\n<td>\n" . $averageMigraineIntensity . "\n</td>\n<tr>\n";
					}

					$stmt->close();
				}
			?>
			</table>
		</div>		
	</body>
</html>
