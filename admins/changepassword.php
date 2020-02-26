<?php 
include ('../config.php');
$servername ="localhost";
$username= "root";
$password= "password";
$dbname = "digital";


$conn = mysqli_connect($servername, $username, $password,$dbname );
if ($conn->connect_error) {
    die("Connection failed:");
}
$query="select * from admin_login where id like '".$id."'";
$sql=mysqli_query($conn,$query);
$row1= mysqli_fetch_assoc($sql);
$username=$row1['username'];

if (isset($_POST['submit'])) {

  $name = $_POST["username"];
if($_POST['password']==$_POST['confirm'])
{
   $password =$_POST["password"];

   $query="update admin_login set username='".$username."',password='".$password."' where id like '".$id."'";
$res = mysqli_query($conn,$query);
if(mysqli_affected_rows($conn)>0) {
  ?><br>
  <div class="alert alert-success">
      <strong>Success!</strong> Your response has been successfully updated.
    <meta http-equiv="refresh" content="10;url=logout.php" />
  </div>

  <?php
}
else {
  ?>
  <br>
  <div class="alert alert-danger">
      <strong>Sorry!</strong>Nothing is Updated.Thank you
      <meta http-equiv="refresh" content="10;url=index.php" />
  </div>
  <?php
}
}
 else
 {
  ?>
   <br>
  <div class="alert alert-danger">
      <strong>Sorry!Passwords should be same</strong>
      <meta http-equiv="refresh" content="10;url=index.php" />
  </div>
  <?php
 } 
}
?>

<!DOCTYPE html>
<html>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="w3.css"> -->

<style type="text/css">
.content {
    max-width: 500px;
    margin: auto;
  /*  background: transparent;*/
  opacity: 0.7;
    padding: 10px;
     height: 100%; 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
.bg {
    /* The image used */
    background-image: url("../img/general.jpg");

    /* Full height */
    height: auto; 
    width: 100%;
/*    padding-top: 8%;*/
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
 
<body class="bg">
  <?php
include('navbar.php');
?>
<div class="content w3-animate-top " style="padding-top: 2%">
<div class="w3-card-4" style="padding-top: 8%;border:solid thin black;border-radius: 10px;border-color: green;box-shadow: 1px 1px 90px #fff;">
  <div class="w3-container" align="center">
    <h2><b style="color: #ffffff">Change Password</b></h2><br><br>
  </div>

  <form action="changepassword.php" method="POST">
  <div class="input-group" style="padding-left: 25px;padding-right: 25px">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input  type="text" class="form-control input-lg" name="username" placeholder="Username" id="username" required="" style="background-color: transparent; color: white" value="<?php echo "$username"; ?>">
</div><br><br>

  <div class="input-group" style="padding-left: 25px;padding-right: 25px">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input id="password" type="password" class="form-control input-lg" name="password"  placeholder="Password" required="" style="background-color: transparent; color: white">
  </div><br><br>


   <div class="input-group" style="padding-left: 25px;padding-right: 25px">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input id="confirm" type="password" class="form-control input-lg" name="confirm"  placeholder="Confirm Password" required="" style="background-color: transparent; color: white">
  </div><br><br>
  <div align="center">
    <button class="btn btn-primary btn-lg" name="submit" type="submit">Submit</button><br><br><br>
  </div>
</form> 

</div>
</div>
</body>
</html> 