<?php
$insert =false;
if(isset($_POST['name'])){

$server ="localhost";
$username ="root";
$password ="";
$con = mysqli_connect($server,$username,$password);
if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());

}
//echo "Sucess connecting to db";
 $name=$_POST['name'];
 $age=$_POST['age'];
 $gender=$_POST['gender'];
 $email=$_POST['email'];
 $phone=$_POST['phone'];
 $desc=$_POST['desc'];
$sql="INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
//echo $sql;
if($con->query($sql) == true ){
    $insert = true;
    //echo "Successfully inserted"; 
}
else{
    echo"ERROR: $sql <br> $con->error";
}
$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,100&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="kiit1.jpg" alt="KIIT">
    <div class="container">
    <h1>Welcome to K.I.I.T.  US Trip Form</h1>
  <p>Interested Students Please Enter your details and submit this form to confirm your participation in the trip</p>
 <?php
 if($insert == true){

 
  echo "<p class='msg'>Thanks for submitting the form. We are happy to see you joining for the US trip</p>";
 }
?>
  <form action="index.php" method="post">
 <input type="text" name="name" id="name" placeholder="Enter your name">   
 <input type="text" name="age" id="age" placeholder="Enter your age">
 <input type="text" name="gender" id="gender" placeholder="Enter your gender">      
 <input type="email" name="email" id="email" placeholder="Enter your email">   
 <input type="phone" name="phone" id="phone" placeholder="Enter your phone">   
<textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
<button class="btn">Submit</button>
    </form>
</div>
    
</body>
</html>