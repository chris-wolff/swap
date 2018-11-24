<!doctype html>

<?php
require_once("generate.php");
require_once("profile.php");

if (!isset($_SESSION)) {
    session_start();
}

#check to make sure logged in correctly, if not send to login page

if (!isset($_SESSION["username"]) || !isset($_SESSION["password"])) {
    header("Location: login.php");
} else {
    $username = $_SESSION['username'];
    $passwordValue = $_SESSION['password'];
    $temp = new Profile("", "", []);
    $profile = $temp->find_profile_on_db($username);
    if ($profile == null) { #couldnt find the username on the db
        header("Location: login.php");
    }
    $password_encrypted = $profile->get_password();
    if (!password_verify($passwordValue, $password_encrypted)) { #password was wrong
        header("Location: login.php");
    }
}
$username = $_SESSION['username'];
$passwordValue = $_SESSION['password'];

#here is where we link the login and signup pages to the landing page


function connectToDB($host, $user, $password, $database) {
	$db_connection = new mysqli($host, $user, $password, $database);
	if ($db_connection->connect_error) {
		die($db_connection->connect_error);
	} else {
	        return $db_connection;
	}
}  

#check to make sure logged in correctly, if not send to login page

?>

<html>

  <head>
    <title>View Profile</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   
  </head>
  
  <body>    
    <div class = "header" style="margin:10px">
      <p><img src="mainImg.jpg" alt="Yellow swap Arrows">
      <h1>&nbspMy Profile</h1></p>
    </div>
    <div class = "container-fluid">
    <?php 
    $host = "localhost";
	  $user = "swapadmin";
	  $password = "password";
	  $database = "swapbase";
	  $table = "profiles";
	
	  $db = connectToDB($host, $user, $password, $database);
	
	  $sql = "SELECT `username`, `password` FROM `profiles` WHERE `username` = '".$username."'";
	
	        $result = mysqli_query($db, $sql);	
          $row_count=mysqli_num_rows($result);
          
				echo("<table class = table table-bordered>");
				echo("<tr><th>UserName</th><th>Password</th></tr>");
				for($i =0; $i < $row_count; $i++){
				  $result->data_seek($i);
          $row = $result->fetch_array(MYSQLI_ASSOC);
          echo("<tr><td>".($row['username'])."</td><td>".($row['password'])."</td></tr>");
				}  
        echo("</table>");
	
          if (!$result) {
		  die("Retrieval failed: ". $db->error);
	  }
    ?>
    </div>
    
    <div class = "container-fluid">
      <form action="landing.php"">
         <input type="submit" value="Return to Main Menu" class="btn btn-warning" style = "width:40%">
      </form>
    </div>
    
    <div class = "container-fluid">
      <hr>
      <p>If you have any questions about Swap, please contact the system administrator at <a href="mailto:admin@swap.com">admin@swap.com</a></p>
    </div>
    
  </body>
</html>

<style>
.header img {
  float: left;
  width: 100px;
  clear: right;

}
.header h1 {
  position: relative;
  top: 15px;
  left: 10px;
  padding-bottom: 60px;

}
</style>

