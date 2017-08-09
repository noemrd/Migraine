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
          <li><a class="navbar-brand" href="landing.html" >Migraine Tracker</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li><a class="navbar-brand" href="aboutUs.html">About Us</a></li>
            <li><a class="navbar-brand" href="userSignUp.php">Sign Up</a></li>
           <li><a class="navbar-brand" href="landing.html">Login</a></li>
        </ul>
      <div>
    </nav>

	<!--Form to submit to: addUser.php and add a volunteer to the database-->
        <h3 align="center">New User Profile</h3>
          <form class="" role="form" name="userForm" method="post" action="addUser.php">
            <div class="signUpBox">
              <!-- FIRST NAME & LAST NAME -->
                  <label id="fnID" class="signUpStyle" for="text">First Name:</label>
                      <input type="text" name="UserFirstName" id="UserFirstName" required="" placeholder="First Name"><br>
                  <label class="signUpStyle" for="text">Last Name:</label>
                      <input type="text" name="UserLastName" id="UserLastName" required="" placeholder="Last Name"><br>

              <!-- SCREEN NAME-->
                  <label class="signUpStyle" for="text">Screen Name:</label>
                      <input type="text" id="UserScreenName" name="UserScreenName" placeholder="Screen Name"><br>		
            
        			<!-- PASSWORD-->
        				<label class="signUpStyle" for="text">Password:</label>
        					<input type="password" id="UserPassword" name="UserPassword" placeholder="Password"><br>							
            </div>
            <div class="buttonCenter">
              <button type="button" class="btn btn-danger" onclick="window.location='landing.html'">Cancel</button>
              <button type="submit" value="Add User" class="btn btn-primary" onclick="window.location='home.html'">Submit</button>
            </div>
          </form>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  </body>
</html>
