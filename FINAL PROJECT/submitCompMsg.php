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
	<?php
		$user = $_GET['user'];
	?>
	<body>
		<div id="submitCompMsgBox">
			<h1 class="submitCompMsg">Thank you for submitting the form, <?php echo $_GET['user'] ?>. To view the results, please click down below.</h1>

			<p class="nameStyle"><a href="mostCommonTriggers.php?user=<?php echo $_GET['user'] ?>">Most Common Triggers</a></p>
			<p class="nameStyle"><a href="averageMigraineAttack.php?user=<?php echo $_GET['user'] ?>">Average Migraine Attack</a></p>
			<p class="nameStyle"><a href="averageMigraineDuration.php?user=<?php echo $_GET['user'] ?>">Average Migraine Duration</a></p>
			<p class="nameStyle"><a href="averageMigraineIntensity.php?user=<?php echo $_GET['user'] ?>">Average Migraine Intensity</a></p>

			<h1 class="submitCompMsg">To add another record, please click down below.</h1>
			<p class="nameStyle"><a href="main.php?user=<?php echo $_GET['user'] ?>">Add another record</a></p>
		</div>
	</body>
</html>