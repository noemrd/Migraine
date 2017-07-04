<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<link href="style.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<form>
			<form>
				<strong>Migraine Intensity:</strong>
				<select>
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
			</form>
			
			<form>
				<strong>Migraine Time Stamp:</strong>
				<input type="date"> <input type="time" name="startTime"> <input type="time" name="endTime">
				<br>

				<strong>Food and Drink:</strong>	
				<select>
					<option>Chocolate</option>
					<option>Alcohol</option>
					<option>Cheese</option>
					<option>Citrus Fruit</option>
					<option>Caffeine</option>
					<option>Nitrates/ Nitrate containing food(hot dog, deli meatm jerky, canned food)</option>
					<option>MSG containing food</option>
					<option>None</option>
				</select>
				<input type="text"><br>	
			</form>

			<form>
				<strong>Sensory:</strong>	
				<select>
					<option>Exposed to bright light</option>
					<option>Exposed to loud sounds</option>
					<option>Exposed to strong smells</option>
					<option>Exposed to temperature change</option>
					<option>Exposed to pressure change</option>
					<option>None</option>
				</select>
				<input type="text"><br>	
			</form>

			<form>
				<strong>Water Intake:</strong>
				<select>
					<option>Had below 0.5 liters  of water</option>
					<option>Had between  0.5 - 1 liters of water </option>
					<option>Had between  1 - 1.5 liters of water</option>
					<option>Had between  1.5 - 2 liters of water  </option>
					<option>Had between  2 - 2.5 liters of water </option>
					<option>Had between  2.5  - 3 liters of water</option>
				</select><br>
			</form>

			<form>
				<strong>Stress:</strong>
				<select>
					<option>Not stressed</option>
					<option>Slightly stressed</option>
					<option>Moderately stressed</option>
					<option>Extremely stressed</option>
				</select><br>
			</form>

			<form>
				<strong>Physical Activity:</strong>
				<select>
					<option>Extremely inactive</option>
					<option>Moderately inactive</option>
					<option>Neutral</option>
					<option>Moderately active</option>
					<option>Extremely active</option>
				</select><br>
			</form>

			<form>
				<strong>Sleep:</strong>
				<select>
					<option>Did not sleep</option>
					<option>Between 1 - 3  hours of sleep</option>
					<option>Between 4 - 6 hours  hours of sleep</option>
					<option>Between 7 - 9  hours  hours of sleep</option>
					<option>Above 10 hours of sleep</option>
				</select><br>
			</form>

			<form>
				<strong>Hormone:</strong>
				<select>
					<option>Menstruation</option>
					<option>Follicular Phase (0 - 14 days from menstruation)</option>
					<option>Luteal phase (14 - 28 days from menstruation</option>
					<option>None of these</option>
				</select><br>
			<form>

			<form>
				<strong>Other:</strong>
				<input type="text"><br>		
			</form>

			<input type="submit" value="Submit">
		</form>
	</body>

</html>