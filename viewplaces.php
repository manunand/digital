<!DOCTYPE html>
<html>
<head>
	<title>Scan QR-Code</title>
</head>
<script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qr_packed.js">
</script>
<script type="text/javascript">
	function openQRCamera(node) {
	  var reader = new FileReader();
	  reader.onload = function() {
	    node.value = "";
	    qrcode.callback = function(res) {
	      if(res instanceof Error) {
	        alert("No QR code found. Please make sure the QR code is within the camera's frame and try again.");
	      } else {
	        node.parentNode.previousElementSibling.value = res;
	      }
	    };
	    qrcode.decode(reader.result);
	  };
	  reader.readAsDataURL(node.files[0]);
	}
	function showQRIntro() {
	  return confirm("Use your camera to take a picture of a QR code.");
	}

</script>
<style type="text/css">
	.qrcode-text-btn {
  display: inline-block;
  height: 1.5em;
  width: 2em;
  background: url(./img/qr.png) 50% 50% no-repeat;
  cursor: pointer;
}

.qrcode-text-btn > input[type=file] {
  position: absolute;
  overflow: hidden;
  width: 2px;
  height: 2px;
  opacity: 0;
}
.qrcode-text {
  padding-right: 1.7em;
  margin-right: 0;
  vertical-align: middle;
}

.qrcode-text + .qrcode-text-btn {
  width: 1.7em;
  margin-left: -1.7em;
  vertical-align: middle;
}


</style>
<body class="bg">
	<?php
	include 'navbar.php';
	?>
	<div class="container-fluid">
		<form method="POST" action="viewplaces.php">
			<div class="container" style="border:solid thin black;border-radius: 10px;padding-bottom: 5%;">
				<h2 class="well well-sm" style="background-color:transparent; animation-duration: 3s;text-shadow:1px 1px 8px black; color: white"><b>Place Details</b></h2><br>
				<div class="form-group">
					<label class="control-label col-sm-2" for="test_id" style="text-align: right;">Select Place:</label>
					<div class="col-sm-9">
						<input type="text" name="place" style="background-color: transparent;" class="qrcode-text" id="place" placeholder="Click Button right to this box" required="">
						<!-- <input type="text" class="qrcode-text" name="place" id="place" disabled="" placeholder="Click Button right to this input box"> -->
						<label class=qrcode-text-btn>
							<input type=file accept="image/*" capture=environment onclick="return showQRIntro();" onchange="openQRCamera(this);" tabindex=-1>
						</label>
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
						$place_name =($_POST['place']);
						$place_id;
						$sql="select * from places where place_name='".$place_name."' ";
						$result=mysqli_query($conn, $sql);
						if ($result-> num_rows >0) {
							$row= $result-> fetch_assoc();
							$place_id=$row['id'];
						}

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
								echo "<div align='center'><video playsinline width='250px' src='./admins/videos/".$name."' controls><embed src='./admins/videos/".$name."' autostart='false' type='video/x-matroska'></embed></video>";
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
								echo "<div align='center'><img src='./admins/images/".$name."' width='250px'></img>";
							}
							echo "</div>";
							
						}
						else
						{
							echo "No Videos Uploaded for this place<br>";
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