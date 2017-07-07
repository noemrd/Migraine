
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <title>Migraine Tracker</title>

  <!-- Bootstrap -->
  <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
</head>

	<body>
		<nav class="navbar navbar-inverse" role="navigation">
			<div class="navbar-header">
				<a href="home.php" class="navbar-brand">Home</a>
			</div>

			<div>
				<ul class="nav navbar-nav pull-right">
					<li><a href="userSignUp.php">Login</a></li>
				</ul>
			</div>
		</nav>


		<div class="col-md-12">
			<h3 class="header-text">New Migraine Data</h3>
			<form class="form-group form-style img-rounded" role="form" name="migraineForm" method="post" action="addAllData.php">
			
				<div class="form-group row">
					<label class="col-md-1" for="text">Migraine Intensity:</label>
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
				</div>
				
				<div class="form-group row">
					<label class="col-md-1" for="text">Migraine Time Stamp:</label>
					<input type="date"> <input type="time" name="MigraineStartTimestamp" id="MigraineStartTimestamp"> <input type="time" name="MigraineEndTimestamp" id="MigraineEndTimestamp">
					<br>
				</div>
				
				<div class="form-group row">
					<label class="col-md-1" for="text">Food and Drink:</label>
					<select class="selectpicker" data-width="fit" name="FoodTriggerItem" required="">
						<option>Chocolate</option>
						<option>Alcohol</option>
						<option>Cheese</option>
						<option>Citrus Fruit</option>
						<option>Caffeine</option>
						<option>Nitrates/ Nitrate containing food(hot dog, deli meat jerky, canned food)</option>
						<option>MSG containing food</option>
						<option>None</option>
					</select>
					<input type="text"><br>	
				</div>

				<div class="form-group row">
					<label class="col-md-1" for="text">Sensory:</label>
					<select class="selectpicker" data-width="fit" name="SensoryTriggerValue" required="">
						<option>Exposed to bright light</option>
						<option>Exposed to loud sounds</option>
						<option>Exposed to strong smells</option>
						<option>Exposed to temperature change</option>
						<option>Exposed to pressure change</option>
						<option>None</option>
					</select>
					<input type="text"><br>	
				</div>

				<div class="form-group row">
					<label class="col-md-1" for="text">Water Intake:</label>
					<select class="selectpicker" data-width="fit" name="WaterIntakeTriggerValue" required="">
						<option>Had below 0.5 liters  of water</option>
						<option>Had between  0.5 - 1 liters of water</option>
						<option>Had between  1 - 1.5 liters of water</option>
						<option>Had between  1.5 - 2 liters of water</option>
						<option>Had between  2 - 2.5 liters of water</option>
						<option>Had between  2.5  - 3 liters of water</option>
					</select><br>
				</div>

				<div class="form-group row">
					<label class="col-md-1" for="text">Stress:</label>
					<select class="selectpicker" data-width="fit" name="StressTriggerValue" required="">
						<option>Not stressed</option>
						<option>Slightly stressed</option>
						<option>Moderately stressed</option>
						<option>Extremely stressed</option>
					</select><br>
				</div>

				<div class="form-group row">
					<label class="col-md-1" for="text">Physical Activity:</label>
					<select class="selectpicker" data-width="fit" name="PhysicalActivityTriggerValue" required="">
						<option>Extremely inactive</option>
						<option>Moderately inactive</option>
						<option>Neutral</option>
						<option>Moderately active</option>
						<option>Extremely active</option>
					</select><br>
				</div>

				
				<div class="form-group row">
					<label class="col-md-1" for="text">Sleep:</label>
					<select class="selectpicker" data-width="fit" name="SleepTriggerValue" required="">
						<option>Did not sleep</option>
						<option>Between 1 - 3  hours of sleep</option>
						<option>Between 4 - 6 hours  hours of sleep</option>
						<option>Between 7 - 9  hours  hours of sleep</option>
						<option>Above 10 hours of sleep</option>
					</select><br>
				</div>

				<div class="form-group row">
					<label class="col-md-1" for="text">Hormone:</label>
					<select class="selectpicker" data-width="fit" name="HormoneTriggerValue" required="">
						<option>Menstruation</option>
						<option>Follicular Phase (0 - 14 days from menstruation)</option>
						<option>Luteal phase (14 - 28 days from menstruation</option>
						<option>None of these</option>
					</select><br>
				</div>

				<div class="form-group row">
					<label class="col-md-1" for="text">Other:</label>					
					<input type="text"><br>		
				</div>

				<button type="button" class="btn btn-default" onclick="window.location='landing.html'">Cancel</button>
				<button type="submit" id="migraineDataSubmit" value="Add Migraine Data" class="btn btn-primary"onclick="window.location='home.html'">Submit</button>
			
			</form>
		</div>
	</body>

</html>