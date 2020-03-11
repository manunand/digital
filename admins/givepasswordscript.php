<?php
ini_set('display_errors', 1);
error_reporting (E_ALL);
$servername ="localhost";
$username= "root";
$password= "password";
$dbname = "digital";
$conn = mysqli_connect($servername, $username, $password,$dbname );
if ($conn->connect_error) {
    die("Connection failed: " .mysqli_connect_error());
}
if (isset($_POST['submit'])) {
$id1=($_POST['id']);
$username1=($_POST['username']);

$sql="select * from adminlist where id like '".$id1."'";
$res=mysqli_query($conn,$sql);
$row1= mysqli_fetch_assoc($res);

if ($_POST['confirm']==$_POST['password']) {
$password=($_POST['password']);

$query="insert into admin_login(username,password,privilege,id) values('$username1','$password',1,'$id1')";

$res = mysqli_query($conn,$query);
if(mysqli_affected_rows($conn)>0) {
	?><br><br><br>
	<div class="alert alert-success">
  		<strong>Success!</strong> Your response has been successfully recorded.Thank you.
		<meta http-equiv="refresh" content="3;url=index.php" />
	</div>

	<?php
}
else {
	?>
	<br><br><br>
	<div class="alert alert-danger">
  		<strong>Sorry!</strong> Please try to re enter your details. Please make sure credentials such as id is unique
  		<meta http-equiv="refresh" content="5;url=index.php" />
	</div>
	<?php
} 
}
else
{
	?>
	<br><br><br>
	<div class="alert alert-danger">
  		<strong>Sorry!</strong> Passwords should be same
  		<meta http-equiv="refresh" content="4;url=givepassword.php" />
	</div>
	<?php
}
}
?>