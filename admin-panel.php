<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<?php

// php select option value from database

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "gymsystem";

// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query
$query = "SELECT * FROM `Trainer`";

// for method 1

$result1 = mysqli_query($connect, $query);



?>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">
  </head>
  <body style="background-image: url('./images/orange.jpg'); background-size: cover;">
      
   
       
 <!-- <div class="jumbotron" style="border-radius:0;background:url('images/3.jpg');background-size:cover;height:400px;"></div> -->
   <div class="container-fluid" style="margin-top:20px">
    <div class="row">
        <div class="col-md-3">
            <div  class="list-group">
                <a href="" class="list-group-item active" style="background-color:#F85A16;color:white; border:none;"
                   >Members</a>
                <a href="trainer_details.php" class="list-group-item">Member details</a>
                <a href="package.php" class="list-group-item">Package details</a>
                <a href="payment.php" class="list-group-item">Payments</a>
            </div>
            <hr>
            <div class="list-group">
              <!-- <a href="trainer.php" class="list-group-item active">Trainer</a> -->
              <a style="background-color:#F85A16;color:white; border:none;" href="trainer.php" class="list-group-item active">Trainer details</a>             
              <!-- <a href="trainer.php" class="list-group-item active">Add new Trainer</a> -->
            </div>      
            
        </div>
            <div class="col-md-8">
            <div class="card" style="border:none; background:none;">
                
     <div class="card-body" >
                <h3 style="color:#F85A16;font-weight: bold;">Register new members</h3>
                </div> 
                <div class="card-body"></div>
                <form class="form-group" action="func.php" method="post">
                <label> &nbsp;First name:</label>
<input type="text" name="fname" class="form-control"><br>
                    <label>&nbsp;Last name:</label>
<input type="text" name="lname" class="form-control"><br> 
 <label>&nbsp;Email</label>
                    <input type="text" name="email" class="form-control"><br>
                    <label>&nbsp;Member ID</label>
<input type="text" name="contact" class="form-control"><br>        
 <label >&nbsp;Trainer </label> 
 <select style="height: calc(2.25rem + 29px);"  class="form-control" name="docapp">

            <?php while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>

        </select>
        <br>
                                        
  <input type="submit" class="btn btn-primary" name="pat_submit" value="Register">                    
                    
                    
                </form>
                </div>
      </div>
       </div>
      <div class="col-md-1"></div>
      </div>
    <header>
 <nav>
     <div class="main-wrapper">
	      
		       <div class="nav-login">
			      
                              
                               						
				                </form>
				              <a href="logout.php" class="btn btn-primary" >Logout</a>
							
						
				   
				    
					
				
		       </div>
	 </div>
 </nav>

</header>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

     </body>
    
</html>
   