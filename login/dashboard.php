<?php

include_once 'session.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

    <?php if(!isset($_SESSION['username'])): header("location: logout.php");?>

    <?php else: ?>

    <?php endif ?>
    <button class="color"><h2 ><a href="logout.php"> Logout</a></h2></button>
<div class="container1">
    <?php echo "<h1 > Welcome ".$_SESSION['username']."  Fill This Form for your Attendance!  </h1>" ?>
    </div>
    <p style="color:red;text-align:center">NOTE:please fill this form within given time period.</p>


   


<?php
$insert=false;

  if(isset($_POST['name'])){
    

 $server="localhost";
 $username="root";
 $password="";

 $con = mysqli_connect( $server, $username,$password);

 if(!$con){
     die("connection to this database failed due to " .mysqli_connect_error());
 }
// echo"success connectiong  to db";
$name= $_POST['name'];
$registration= $_POST['registration'];
$roll= $_POST['roll'];
$college=$_POST['college'];
$branch=$_POST['branch'];
$subject=$_POST['subject'];


$sql= "INSERT INTO `attendance`.`attendance` (`S.L`, `name`, `registration`, `roll`, `college`, `branch`, `subject`, `date-time`)
 VALUES (NULL, '$name', '$registration', '$roll', '$college', '$branch', '$subject', current_timestamp())";


 // echo $sql;

if($con->query($sql)==true){
   // echo "successfully inserted!";
   $insert=true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}
$con->close();
  }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
    <link rel="stylesheet" href="st.css">
    <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"
  />
 <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
</head>
<body>
      <div class="container">
               <div class="header">
                   <h1>Attendance Sheet</h1>
               </div>
             <form action="dashboard.php" method="post">
               <div class="log">
                   <div class="logbody">
                   <label for="name">Name:</label><br>
                   <input type="text" name="name" id="name" placeholder="Enter your Name">
                   </div>
                <div class="logbody">
                   <label for="age">Registration No.:</label><br>
                   <input type="number" name="registration" id="registration" placeholder="Enter your college registration no.">
                </div>
                <div class="logbody">
                   <label for="gender">College Roll No.:</label><br>
                   <input type="text" name="roll" id="roll" placeholder="Enter your Roll No.">
                </div>
                <div class="logbody">
                   <label for="college">College:</label><br>
                   <input type="text" name="college" id="college" placeholder="Enter your college name">
            </div>
            <div class="logbody">
                   <label for="branch">Branch:</label><br>
                   <input type="text" name="branch" id="branch" placeholder="Enter your current branch">
                </div>
                <div class="logbody">
                   <label for="branch">Subject Name:</label><br>
                   <input type="text" name="subject" id="subject" placeholder="Enter Subject Name">
                </div>
            
                  <div class="submit">
                      <button class="btn">Submit</button>
                  </div>
               </div>
              
            </form>
      </div>
      <?php  
      if($insert==true){
           echo "<p class='submitmsg'>Your Response has been Recorded!</p>";
      }
      ?>


  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>









</body>
</html>