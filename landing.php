<!doctype html>

<?php    

#check to make sure logged in correctly, if not send to login page


session_start();
$_SESSION['user'] = 'gherr';
$_SESSION['password']   = 'password';


?>

<html>

  <head>
    <title>Swap Main Menu</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   
  </head>
  
  <body>    
    <div class = "header" style="margin:10px">
      <p><img src="mainImg.jpg" alt="Yellow swap Arrows">
      <h1>&nbspWelcome to Swap</h1></p>
    </div>
    
    <div class ="container" style="float:left">
      <p> Swap can be used to exchange or trade items with other users. Click "Browse All Listings" to see what other users can offer you or add an item to your inventory to start Swapping with others. </p>
    </div>
    
    <div class = "row1">
      <form action="viewProfile.php" method="post"> 
        <input type="submit" name="myProfile" value="View My Profile" style="height:30px; width:250px; margin:5px" />
      </form>		
      <form action="editProfile.php" method="post"> 
        <input type="submit" name="editProfile" value="Edit My Profile" style="height:30px; width:250px; margin:5px" />
      </form>		
    </div>
    <p><br><br><p>
    
    <div class = "row2" >  
      <form action="viewInventory.php" method="post"> 
        <input type="submit" name="myInventory" value="View My Inventory" style="height:30px; width:250px; margin:5px" />
      </form>		
      <form action="editInventory.php" method="post"> 
        <input type="submit" name="editInventory" value="Edit My Inventory" style="height:30px; width:250px; margin:5px" />
      </form>
    </div>
    <p><br><br><br><p>
    
    <div class = "row3">  
      <form action="inbox.php" method="post"> 
        <input type="submit" name="inbox" value="My Inbox" style="height:40px; width:510px; margin:5px" />
      </form>		
    </div>
    <p><br><br><p>
    <div class = "row4">  
      <form action="allListings.php" method="post"> 
        <input type="submit" name="allListings" value="Browse All Listings" style="height:40px; width:510px; margin:5px;" />
      </form>		
    </div>

    <div style="margin:10px">
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

.row1 { float: left; display: block;   }
.row2 { float: left; display: block;   }
.row2 { float: left; display: block;   }
.row3 { float: left; display: block;   }
</style>