<!doctype html>

<?php  

function connectToDB($host, $user, $password, $database) {
	$db_connection = new mysqli($host, $user, $password, $database);
	if ($db_connection->connect_error) {
		die($db_connection->connect_error);
	} else {
	        return $db_connection;
	}
}  

#check to make sure logged in correctly, if not send to login page


session_start();

$username = $_SESSION['user'];
$password = $_SESSION['password'];
?>

<html>

  <head>
    <title>Edit Inventory</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   
  </head>
  
  <body>    
    <div class = "header" style="margin:10px">
      <p><img src="mainImg.jpg" alt="Yellow swap Arrows">
      <h1>&nbspEdit Inventory</h1></p>
    </div>
    <div class = "container-fluid">
    <?php 
    $host = "localhost";
	  $user = "swapadmin";
	  $password = "password";
	  $database = "swapbase";
	  $table = "items";
	
	  $db = connectToDB($host, $user, $password, $database);
	
	  $sql  = "DELETE FROM `items` WHERE `name` = '".$_POST['name']."' AND `value` = ".$_POST['value']." AND `user-key` = '".$username."' ";
	
	  $result = mysqli_query($db, $sql);	
          
	
          if (!$result) {
		  die("Removal failed: ". $db->error);
	  }
	  else{
	        echo("Removal Complete");
	  }
    ?>
    </div>
    <br/>
    <div class = "container-fluid">    
      <form action="landing.php"">
         <input type="submit" value="Return to Main Menu">
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
