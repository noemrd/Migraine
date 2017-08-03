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

	<!-- Carousel -->
	<!--Citation: https://www.w3schools.com/bootstrap/bootstrap_carousel.asp -->
	<h3 id="user"> Welcome <?php echo $_GET['user'] ?>! </h3><br>

	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>

		<div class="carousel-inner">
			<div class="item active">
				<img src="img/migraineCaraPic1.jpg" style="width:100%; height:500px;">
			</div>

			<div class="item">
				<img src="img/migraineCaraPic2.jpg" style="width:100%; height:500px;">
			</div>

			<div class="item">
				<img src="img/migraineCaraPic3.jpg" style="width:100%; height:500px;">
			</div>
		</div>

		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<br>
	<br>

	<!-- Small boxes with news -->
		<div class="smallBoxNewsTop" id="marginFix">
				<img class="capImgSize" src="img/smallBoxImg1.jpg" hreft="#">
				<a href="http://www.mayoclinic.org/diseases-conditions/migraine-headache/symptoms-causes/dxc-20202434" target="_blank">
				<p id="caption1">Full detailed information regarding<br> Migraine from Mayo Clinic.</p>
				</a>
		</div> 

		<div class="smallBoxNewsTop">
				<img class="capImgSize" src="img/smallBoxImg2.jpg"">
				<a href="http://www.telegraph.co.uk/science/2016/05/31/migraines-raise-risk-of-heart-attack-and-early-death-scientists/" target="_blank">
				<p id="caption2">Migraines raise risk of heart attack<br> and early death, scientists find.</p>
				</a>
		</div>

		<div class="smallBoxNewsBottom" id="marginFix">
				<img class="capImgSize" src="img/smallBoxImg3.jpg"">
				<a href="http://www.neurologyadvisor.com/migraine-and-headache/migraine-relieved-with-deactivation-of-trigger-sites/article/676799/" target="_blank">
				<p id="caption3">Migraine Relieved With Deactivation of <br>Trigger Sites.</p>
				</a>
				<hr id="homeHR">
		</div>

		<div class="smallBoxNewsBottom">
				<img class="capImgSize" src="img/smallBoxImg4.jpg"">
				<a href="http://www.dailymail.co.uk/health/article-4689000/Scientists-develop-test-predict-migraine-strikes.html" target="_blank">
				<p id="caption4">Scientists are developing a test  that <br>can  predict when a crippling <br>headache may strike.</p>
				</a>
				<hr id="homeHR">
		</div>   
</body>