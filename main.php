
<script>
     function compareDates() {     
         var startDate = new Date(document.getElementById("MigraineStartTimestamp").value);
         var endDate = new Date(document.getElementById("MigraineEndTimestamp").value);
         console.log(endDate.getMonth);
         console.log(startDate.getMonth);
         if ( endDate.getFullYear() >= startDate.getFullYear() &&
	            endDate.getMonth() > startDate.getMonth() &&
	       		(endDate.getDate() > startDate.getDate() || endDate.getDate() < startDate.getDate()) &&
		        (endDate.getTime() > startDate.getTime() || endDate.getTime() < startDate.getTime() || endDate.getTime() == startDate.getTime())
		    ){
		 			return true;
         }
         else if ( endDate.getFullYear() >= startDate.getFullYear() &&
	            endDate.getMonth() > startDate.getMonth() &&
		        endDate.getDate() == startDate.getDate() && 
		        endDate.getTime() > startDate.getTime()
		    ){
		 			return true;
         }
         else if ( endDate.getFullYear() >= startDate.getFullYear() &&
		            endDate.getMonth() == startDate.getMonth() &&
		            	endDate.getDate() > startDate.getDate() &&
			            	(endDate.getTime() > startDate.getTime() || endDate.getTime() < startDate.getTime() || endDate.getTime() == startDate.getTime())
		        ){
		        	return true;	
        } 
        else if ( endDate.getFullYear() >= startDate.getFullYear() &&
		            endDate.getMonth() == startDate.getMonth() &&
		            endDate.getDate() == startDate.getDate() && 
		            endDate.getTime() > startDate.getTime()     
		        ){
		        	return true;	
        } 
        else if ( endDate.getFullYear() == startDate.getFullYear() &&
            endDate.getMonth() == startDate.getMonth() &&
            endDate.getDate() == startDate.getDate() &&
            endDate.getTime() == startDate.getTime() ) 
            { 
             alert ("End Date is same as Start Date");
             return false;
        }
        else {
             alert ("End Date is before Start Date");
             return false;
        }
     }
</script>

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
		<nav class="navbar navbar-default navbar-custom">
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

		<!--Form-->
			<h3>Migraine Data Form</h3>
			<!--<form role="form" name="migraineForm" method="post" action="addAllData.php">-->
			<form class="form-horizontal" role="form" name="migraineForm" method="post" onsubmit="return compareDates()" action="addAllData.php">

				<div class="formStyle">

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
					<br>
					Please enter the highest migraine intensity you felt during this migraine attack 
					<br>

					<label class="labelStyle" for="text">Migraine Intensity:</label>
					<select class="selectpicker" data-width="fit" name="MigraineIntensity" required="">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
						<option>10</option>
					</select><br>
					<img src="img/painlevel.jpg" alt="migraine intensity picture" style="margin-left:205px">
					<br>
					<br>
					Please enter what triggers you were exposed to in the 24 hours prior to your migraine onset.
					<br>


					<label class="labelStyle" for="text">Water Intake:</label>
					<select class="selectpicker" data-width="fit" name="WaterIntakeTriggerValue" required="">
						<option value="Had below 0.5 liters of water">Had below 0.5 liters of water</option>
						<option value="Had between 0.5 and 1 liters of water">Had between 0.5 and 1 liters of water</option>
						<option>Had between 1 and 1.5 liters of water</option>
						<option>Had between 1.5 and 2 liters of water</option>
						<option>Had between 2 and 2.5 liters of water</option>
						<option>Had between 2.5 and 3 liters of water</option>
						<option>Had beyond 3 liters of water</option>
					</select><br>

					<label class="labelStyle" for="text">Stress:</label>
					<select name="StressTriggerValue" required="">
						<option>Not stressed</option>
						<option>Slightly stressed</option>
						<option>Moderately stressed</option>
						<option>Extremely stressed</option>
					</select><br>

					<label class="labelStyle"for="text">Physical Activity:</label>
					<select name="PhysicalActivityTriggerValue" required="">
						<option>Extremely inactive</option>
						<option>Moderately inactive</option>
						<option>Neutral</option>
						<option>Moderately active</option>
						<option>Extremely active</option>
					</select><br>

					<label class="labelStyle" for="text">Sleep:</label>
					<select name="SleepTriggerValue" required="">
						<option>Did not sleep</option>
						<option>Between 1 and 3 hours of sleep</option>
						<option>Between 4 and 6 hours of sleep</option>
						<option>Between 7 and 9 hours of sleep</option>
						<option>Above 10 hours of sleep</option>
					</select><br>

					<label class="labelStyle" for="text">Hormone:</label>
					<select name="HormoneTriggerValue" required="">
						<option>Menstruation</option>
						<option>Follicular Phase: 0 to 14 days from menstruation</option>
						<option>Luteal phase: 14 to 28 days from menstruation</option>
						<option>None of these</option>
					</select><br>

				

					<label class="labelStyle" for="text">Food and Drink:</label>
						<div class="checkboxAlign">
							<input type="checkbox" name="FoodTriggerItem[]" id="FoodTriggerItem" value="Chocolate">Chocolate<br>
							<input type="checkbox" name="FoodTriggerItem[]" id="FoodTriggerItem" value="Alcohol">Alcohol<br>
							<input type="checkbox" name="FoodTriggerItem[]" id="FoodTriggerItem" value="Cheese">Cheese<br>
							<input type="checkbox" name="FoodTriggerItem[]" id="FoodTriggerItem" value="Citrus Fruit">Citrus Fruit<br>
							<input type="checkbox" name="FoodTriggerItem[]" id="FoodTriggerItem" value="Caffeine">Caffeine<br>
							<input type="checkbox" name="FoodTriggerItem[]" id="FoodTriggerItem" value="Nitrates/ Nitrites containing food (hot dog, deli meat, jerky, canned food)">Nitrates/ Nitrites containing food (hot dog, deli meat, jerky, canned food)<br>
							<input type="checkbox" name="FoodTriggerItem[]" id="FoodTriggerItem" value="MSG containing food">MSG containing food<br>
							<input type="checkbox" name="FoodTriggerItem[]" id="FoodTriggerItem" value="None">None<br>
						</div>

					<label class="labelStyle" for="text">Sensory:</label>
						<div class="checkboxAlign">
							<input type="checkbox" name="SensoryTriggerValue[]" id="SensoryTriggerValue" value="Exposed to bright light">Exposed to bright light<br>
							<input type="checkbox" name="SensoryTriggerValue[]" id="SensoryTriggerValue" value="Exposed to loud sounds">Exposed to loud sounds<br>
							<input type="checkbox" name="SensoryTriggerValue[]" id="SensoryTriggerValue" value="Exposed to strong smells">Exposed to strong smells<br>
							<input type="checkbox" name="SensoryTriggerValue[]" id="SensoryTriggerValue" value="Exposed to temperature change">Exposed to temperature change<br>
							<input type="checkbox" name="SensoryTriggerValue[]" id="SensoryTriggerValue" value="Exposed to pressure change">Exposed to pressure change<br>						
							<input type="checkbox" name="SensoryTriggerValue[]" id="SensoryTriggerValue" value="None">None<br>					</div>

                                     
						
				</div>

				<div class="buttonAlign">

					<button type="button"" class="buttonStyle" id="migraineDataCancel" onclick="window.location='landing.html'">Cancel</button>
					<button type="submit" class="buttonStyle" id="migraineDataSubmit" value="Add Migraine Data" onclick="window.location='main.php'">Submit</button>
				</div>

			</form>
		</div>
	</body>
