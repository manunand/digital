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

if (isset($_POST['video_upload'])) {
	$place_id =($_POST['place_id']);
	$name =$_FILES['video_file']['name'];
	$tmp =$_FILES['video_file']['tmp_name'];

	$file = $_FILES['video_file']['name'];
	if(is_uploaded_file($file)) {
		echo "this file is already uploaded";
	} else {
	  move_uploaded_file($tmp, "videos/".$name);
	}

	
	$query="insert into videos(place_id,video_name) values('$place_id','$name')";
	/*$res=$conn->query($query);*/
	$res = mysqli_query($conn,$query);
	if(mysqli_affected_rows($conn)>0) {
		?><br><br><br>
			<div class="alert alert-success">
				<strong>Success!</strong> Please Wait your video is uploading........
				<meta http-equiv="refresh" content="8;url=index.php" />
			</div>
		<?php
	}
	else {
		?>
		<br><br><br>
		<div class="alert alert-danger">
			<strong>Sorry!</strong> Uploading failed..
			<meta http-equiv="refresh" content="4;url=addmedia.php" />
		</div>
		<?php
	}
	
}





if (isset($_POST['image_upload'])) {
	$place_id =($_POST['place_id']);
	$name =$_FILES['image_file']['name'];
	$tmp =$_FILES['image_file']['tmp_name'];

	$file = $_FILES['image_file']['name'];
	if(is_uploaded_file($file)) {
		echo "this file is already uploaded";
	} else {
	  move_uploaded_file($tmp, "images/".$name);
	}

	
	$query="insert into images(place_id,image_name) values('$place_id','$name')";
	/*$res=$conn->query($query);*/
	$res = mysqli_query($conn,$query);
	if(mysqli_affected_rows($conn)>0) {
		?><br><br><br>
			<div class="alert alert-success">
				<strong>Success!</strong> Please Wait your Image is uploading........
				<meta http-equiv="refresh" content="4;url=index.php" />
			</div>
		<?php
	}
	else {
		?>
		<br><br><br>
		<div class="alert alert-danger">
			<strong>Sorry!</strong> Uploading failed..
			<meta http-equiv="refresh" content="4;url=addmedia.php" />
		</div>
		<?php
	}
	
}
 
?>