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
$query="select * from adminlist where id like '".$id."'";
$sql=mysqli_query($conn,$query);
$row1= mysqli_fetch_assoc($sql);

$name=$row1['name'];
$gender=$row1['gender'];
$email=$row1['email'];
$phone=$row1['phone'];
$address=$row1['address'];
$desig=$row1['desig'];

if (isset($_POST['submit'])) {
  $name = $_POST["name"];
  $gender = $_POST["gender"];
  $email= $_POST["email"];
  $phone=$_POST["phone"];
  $address=$_POST['address'];
  $desig=$_POST["desig"];

  $query="update adminlist set desig='".$desig."',name='".$name."',gender='".$gender."',email='".$email."',phone='".$phone."',address='".$address."' where id like '".$id."'";
$res = mysqli_query($conn,$query);
if(mysqli_affected_rows($conn)>0) {
  ?><br>
  <div class="alert alert-success">
      <strong>Success!</strong> Your response has been successfully updated.
    <meta http-equiv="refresh" content="2;url=index.php" />
  </div>

  <?php
}
else {
  ?>
  <br>
  <div class="alert alert-danger">
      <strong>Sorry!Same Data</strong>Nothing is Updated.Thank you
      <meta http-equiv="refresh" content="2;url=index.php" />
  </div>
  <?php
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Digital Tourist Guide | Edit Profile</title>
</head>
<style type="text/css">
  
label
{
  color: #000000;
  font-weight: bold;
}

h1
{
  color: #000000;
  font-weight: bold;
}

</style>
<body>
  <?php include 'navbar.php'; ?>
  <div class="container-fluid" style="background-color: #abcdab">
    <div  class="container" style="width: 70%;background-color: transparent;  color: black; border:solid thin black;border-radius: 10px;">
      <h1 align="center" class="w3-animate-top">Edit Details</h1><br>
      <form  class="form-horizontal w3-animate-zoom" action="editprofile.php" method="POST">
        
        <div class="form-group">
          <label class="control-label col-sm-2" for="name">Name:</label>
          <div class="col-sm-9">
            <input type="text" name="name" style="background-color: transparent; color: white" class="form-control" id="name" placeholder="Enter Name" required="" value="<?php echo "$name"; ?>">
          </div>
        </div><br>
        <div class="form-group">
          <label class="control-label col-sm-2" for="Gender">Gender:</label>
          <div class="container" style="padding-left: 17%">
            <label class="radio-inline"><input type="radio" name="gender" value="Male" <?php if($gender== 'Male')  echo "checked"; ?>>Male</label>
            <label class="radio-inline"><input type="radio" name="gender" value="Female" <?php if($gender=='Female')  echo "checked"; ?>>Female</label>
          </div>
        </div><br>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Email:</label>
          <div class="col-sm-9">
            <input type="email" name="email" style="background-color: transparent; color: white" class="form-control" required="" id="email" placeholder="Enter email" value="<?php echo "$email"; ?>">
          </div>
        </div><br>
        <div class="form-group">
          <label class="control-label col-sm-2" for="phone">Phone Number:</label>
          <div class="col-sm-9">
            <input type="Number" name="phone" style="background-color: transparent; color: white" class="form-control" required="" id="phone" placeholder="Enter Phone Number" pattern="[789][0-9]{9}" value="<?php echo $phone; ?>">
          </div>
        </div><br>
        <div class="form-group">
          <label class="control-label col-sm-2" for="address">Address</label>
          <div class="col-sm-9">
            <textarea name="address" style="background-color: transparent;color: white" class="form-control" required="" id="address" placeholder="Enter Your Address"><?php echo $address; ?>
            </textarea>
          </div>
        </div><br>
        <div class="form-group">
          <label class="control-label col-sm-2" for="desig">Designation:</label>
          <div class="col-sm-9">
            <input type="text" name="desig" style="background-color: transparent; color: white" class="form-control" id="desig" placeholder="Enter Designation" required="" value="<?php echo "$desig"; ?>">
          </div>
        </div><br>
        <div class="form-group">
          <div class="container" align="center">
            <button type="submit" class="btn btn-info" name="submit">Update</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>