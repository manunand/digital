<!DOCTYPE html>
<html>
<head>
	<title>Digital Tourist Guide | view Places</title>
</head>
<body class="bg">
	<?php
	include 'navbar.php';
	?>

	<div class="container-fluid">
		<form method="POST" action="viewplace.php">
			<div class="container" style="border:solid thin black;border-radius: 10px;padding-bottom: 5%;">
				<h2 class="well well-sm" style="background-color:transparent; animation-duration: 3s;text-shadow:1px 1px 8px black; color: white"><b>Place Details</b></h2><br>
				<div class="form-group">
					<label class="control-label col-sm-2" for="test_id" style="text-align: right;">Select Place:</label>
					<div class="col-sm-9">
						<select name="place" class="form-control" id="place" required="" style="background-color: transparent;">
							<option disabled selected>Choose any Place</option>
							<?php
								ini_set('display_errors', 1);
								error_reporting (E_ALL);
								$servername ="localhost";
								$username= "root";
								$password= "password";
								$dbname = "digital";
								$conn = mysqli_connect($servername, $username, $password,$dbname );
								if ($conn->connect_error) {
									die("Connection failed: ");
								}
								$sql="select * from places";
								$result=mysqli_query($conn, $sql);
								if ($result-> num_rows >0) {
									while ($row= $result-> fetch_assoc()) {
										echo "<option value=".$row["id"].">".$row["place_name"]."</option>";
									}
								}
								else{
									echo "0 result";
								}
								$conn-> close();
							?>
						</select>
					</div>
				</div><br>
				<div class="form-group">
	                <div class="container" align="center">
	                  <button type="submit" class="btn btn-info" name="submit">View</button>
	                </div>
	            </div>
				<?php
					ini_set('display_errors', 1);
					error_reporting (E_ALL);
					$servername ="localhost";
					$username= "root";
					$password= "password";
					$dbname = "digital";
					$conn = mysqli_connect($servername, $username, $password,$dbname );
					if ($conn->connect_error) {
						die("Connection failed: ");
					}
					if (isset($_POST['submit'])) {
						$place_id =($_POST['place']);
						$sql="select * from places where id='".$place_id."' ";
						$result=mysqli_query($conn, $sql);
						if ($result-> num_rows >0) {
							$row= $result-> fetch_assoc();
							?>
							<div align="center">
								<h1><?php echo $row['place_name']; ?></h1>
								<h4><?php echo $row['description']; ?></h4>
							</div>
							<?php
						}


						$sql="select * from videos where place_id='".$place_id."'";
						$result=mysqli_query($conn, $sql);
						if ($result-> num_rows >0) {
							?><h1 align="center">Videos</h1><?php
							while ($row= $result-> fetch_assoc()) {
								$name=$row['video_name'];
								echo "<div align='center'><video width='480' src='videos/".$name."' controls><embed src='videos/".$name."' autostart='false' type='video/x-matroska'></embed></video>";
							}
							echo "</div>";	
						}
						else
						{
							echo "No Videos Uploaded for this place<br>";
						}
						$sql="select * from images where place_id='".$place_id."'";
						$result=mysqli_query($conn, $sql);
						if ($result-> num_rows >0) {
							echo "<br>";
							?><h1 align="center">Pictures</h1><?php
							while ($row= $result-> fetch_assoc()) {
								$name=$row['image_name'];
								echo "<div align='center'><img src='images/".$name."' width='480'></img>";
							}
							echo "</div>";
							
						}
						else
						{
							echo "No Videos Uploaded for this place<br>";
						}
						$sql="select * from places where id='".$place_id."' ";
						$result=mysqli_query($conn, $sql);
						if ($result-> num_rows >0) {
							$row= $result-> fetch_assoc();
							$imgname=$row['place_name'];
							?>
							<div align="center">
								<img src="<?php echo "./qrcodes/".$imgname.".png"; ?>">
							</div>
							<?php
						}

						$conn-> close();
					}
				?>
			</div>
		</form>
	</div>
	<?php 
		include 'footer.php';
	?>
</body>
</html>