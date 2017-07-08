
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
		<nav class="navbar navbar-default navbar-custom">
			<div class="container-fluid">
				<ul class="nav navbar-nav">
					<li><a href="home.php">Home</a></li>
					<li><a href="main.php">Migraine Form</a></li>
					<li><a href="results.html">Results</a></li>
					<li><a href="landing.html">Login</a></li>
					<li><a href="addFood.html">Add Food Triggers</a></li>
					
				</ul>
			</div>
		</nav>

		<!--Form-->
			<h3>Migraine Data Form</h3>
			<form role="form" name="migraineForm" method="post" action="addAllData.php">
				<div class="formStyle">
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

					<label class="labelStyle" for="text">Migraine Start Date and Time:</label>
					<input type="date"> <input type="time" name="MigraineStartTimestamp" id="MigraineStartTimestamp"> 
					<br>

					<label class="labelStyle" for="text">Migraine End Date and Time:</label>
					<input type="date"> <input type="time" name="MigraineEndTimestamp" id="MigraineEndTimestamp">
					<br>
					<br>
					Please enter what triggers you were exposed to in the 24 hours prior to your migraine onset.
					<br>

					<label class="labelStyle" for="text">Food and Drink:</label>
						<div class="checkboxAlign">
							<input type="checkbox" name="FoodTriggerItem" value="Chocolate" required="">Chocolate<br>
							<input type="checkbox" name="FoodTriggerItem" value="Alcohol" required="">Alcohol<br>
							<input type="checkbox" name="FoodTriggerItem" value="Cheese" required="">Cheese<br>
							<input type="checkbox" name="FoodTriggerItem" value="Citrus Fruit" required="">Citrus Fruit<br>
							<input type="checkbox" name="FoodTriggerItem" value="Caffeine" required="">Caffeine<br>
							<input type="checkbox" name="FoodTriggerItem" value="Nitrates/ Nitrites containing food (hot dog, deli meat, jerky, canned food)" required="">Nitrates/ Nitrites containing food (hot dog, deli meat, jerky, canned food)<br>
							<input type="checkbox" name="FoodTriggerItem" value="MSG containing food" required="">MSG containing food<br>
							<input type="checkbox" name="FoodTriggerItem" value="None" required="">None<br>
						</div>
					<label class="labelStyle" for="text">Sensory:</label>
						<div class="checkboxAlign">
							<input type="checkbox" name="SensoryTriggerValue" value="Exposed to bright light" required="">Exposed to bright light<br>
							<input type="checkbox" name="SensoryTriggerValue" value="Exposed to loud sounds" required="">Exposed to loud sounds<br>
							<input type="checkbox" name="SensoryTriggerValue" value="Exposed to strong smells" required="">Exposed to strong smells<br>
							<input type="checkbox" name="SensoryTriggerValue" value="Exposed to temperature change" required="">Exposed to temperature change<br>
							<input type="checkbox" name="SensoryTriggerValue" value="Exposed to pressure change" required="">Exposed to pressure change<br>
							<input type="checkbox" name="SensoryTriggerValue" value="None" required="">None<br>
													</div>

					<label class="labelStyle" for="text">Water Intake:</label>
					<select class="selectpicker" data-width="fit" name="WaterIntakeTriggerValue" required="">
						<option>Had below 0.5 liters  of water</option>
						<option>Had between  0.5 - 1 liters of water</option>
						<option>Had between  1 - 1.5 liters of water</option>
						<option>Had between  1.5 - 2 liters of water</option>
						<option>Had between  2 - 2.5 liters of water</option>
						<option>Had between  2.5  - 3 liters of water</option>
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
						<option>Between 1 - 3  hours of sleep</option>
						<option>Between 4 - 6 hours  hours of sleep</option>
						<option>Between 7 - 9  hours  hours of sleep</option>
						<option>Above 10 hours of sleep</option>
					</select><br>

					<label class="labelStyle" for="text">Hormone:</label>
					<select name="HormoneTriggerValue" required="">
						<option>Menstruation</option>
						<option>Follicular Phase (0 - 14 days from menstruation)</option>
						<option>Luteal phase (14 - 28 days from menstruation</option>
						<option>None of these</option>
					</select><br>

						
				</div>

				<div class="buttonAlign">
					<button type="button"" class="buttonStyle" id="migraineDataCancel" onclick="window.location='landing.html'">Cancel</button>
					<button type="submit" class="buttonStyle" id="migraineDataSubmit" value="Add Migraine Data" onclick="window.location='home.html'">Submit</button>
				</div>
			</form>
		</div>
	</body>

</html>
