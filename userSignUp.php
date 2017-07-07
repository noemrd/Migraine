<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Migraine Tracker</title>
    <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">

  </head>
  <body>
	<nav class="navbar navbar-inverse" role="navigation">
  		<div class="navbar-header">
		<a href="landing.html" class="navbar-brand">Home</a>
  		</div>

  		<div>
  			<ul class="nav navbar-nav pull-right">
  				<li><a href="landing.html">Login</a></li>
  			</ul>
  		</div>
  	</nav>	
	
	<!--Form to submit to: addUser.php and add a volunteer to the database-->

    <div class="col-md-12">
        <h3 class="header-text">New User Profile</h3>
        <form class="form-group form-style img-rounded" role="form" name="userForm" method="post" action="addUser.php">

            <!-- FIRST NAME & LAST NAME -->
            <div class="form-group row">
                <label class="col-md-1" for="text">First Name:</label>
                <div class="col-md-3">
                    <input class="form-control col-md-6" type="text" name="UserFirstName" id="UserFirstName" required="" placeholder="First name">
                </div>

                <label class="col-md-1" for="text">Last Name:</label>
                <div class="col-md-3">
                    <input class="form-control col-md-6" type="text" name="UserLastName" id="UserLastName" required="" placeholder="Last name">
                </div>
            </div>

            <!-- SCREEN NAME-->
            <div class="form-group row">
                <label class="col-md-1" for="text">Screen Name:</label>
                <div class="col-md-3">
                    <input class="form-control col-md-6" type="text" id="UserScreenName" name="UserScreenName" placeholder="screenName">
                </div>				
            
			<!-- PASSWORD -->
				<label class="col-md-1" for="text">Password:</label>
				<div class="col-md-3">
					<input class="form-control col-md-6" type="password" id="UserPassword" name="UserPassword" placeholder="password">
				</div>								
			
			</div>

			
            <button type="button" class="btn btn-default" onclick="window.location='landing.html'">Cancel</button>
            <button type="submit" id="userSubmit" value="Add User" class="btn btn-primary"onclick="window.location='home.html'">Submit</button>
        </form>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  </body>
</html>
