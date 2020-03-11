<!DOCTYPE html>
<html>
<head>
	<title>Digital Tourist Guide | Add Place</title>
</head>
<body class="bg">
	<?php
	include 'navbar.php';
	?>
	<div class="container-fluid" style="padding-bottom: 7%;padding-top: 7%;">
		<div  class="container" style="width: 70%;background-color: transparent;  color: black; border:solid thin black;border-radius: 10px;">
			<h1 align="center" class="w3-animate-top">Add Place Details</h1><br>
			<form  class="form-horizontal w3-animate-zoom" action="addplacescript.php" method="POST">
				
				<div class="form-group">
					<label class="control-label col-sm-2" for="placename">Name :</label>
					<div class="col-sm-9">
						<input type="text" name="placename" style="background-color: transparent; color: white" class="form-control" id="placename" placeholder="Enter Place Name" required="">
					</div>
				</div><br>
				<div class="form-group">
					<label class="control-label col-sm-2" for="placedesc">Description :</label>
					<div class="col-sm-9">
						<textarea name="placedesc" style="background-color: transparent;color: white;" class="form-control" required="" id="placedesc" placeholder="Enter Place Description"></textarea>
					</div>
				</div><br>
				<div class="form-group">
					<div class="container" align="center">
						<button type="submit" class="btn btn-info" name="submit"> Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<?php
	include 'footer.php';
	?>
</body>
</html>