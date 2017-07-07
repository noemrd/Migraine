<?php
	  $passwordVar = $_POST['UserPassword'];
	  
      if(!($stmt = $mysqli->prepare("
      SELECT UserPassword
      FROM Users
      WHERE (Users.UserPassword = '$passwordVar')" ))){
        echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
      }
	  
      if(!$stmt->execute()){
        echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
      }
	  
      if(!$stmt->bind_result($UserPassword)){
        echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
      }
	  
      while($stmt->fetch()){
        echo "<tr>\n<td>\n" . $UserPassword .  "\n</td>\n</tr>";
      }

      $stmt->close();
?>