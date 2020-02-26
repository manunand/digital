<!DOCTYPE html>
<html>
<head>
	<title>Digital Tourist Guide | Add Admin</title>
</head>
<body>
	<?php
	include 'navbar.php';
	?>
	<div class="container-fluid" style="background-color: #abcdab;padding-top: 100px;">
		<div  class="container" style="width: 70%;background-color: transparent;  color: black; border:solid thin black;border-radius: 10px;">
			<h1 align="center" class="w3-animate-top">Add Admin Details</h1><br>
			<form  class="form-horizontal w3-animate-zoom" action="addadminscript.php" method="POST">
				
				<div class="form-group">
					<label class="control-label col-sm-2" for="name">Name:</label>
					<div class="col-sm-9">
						<input type="text" name="name" style="background-color: transparent; color: white" class="form-control" id="name" placeholder="Enter Name" required="">
					</div>
				</div><br>
				<div class="form-group">
					<label class="control-label col-sm-2" for="Gender">Gender:</label>
					<div class="container" style="padding-left: 17%">
						<label class="radio-inline"><input type="radio" name="gender" value="Male">Male</label>
						<label class="radio-inline"><input type="radio" name="gender" value="Female">Female</label>
					</div>
				</div><br>
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">Email:</label>
					<div class="col-sm-9">
						<input type="email" name="email" style="background-color: transparent; color: white" class="form-control" required="" id="email" placeholder="Enter email">
					</div>
				</div><br>
				<div class="form-group">
					<label class="control-label col-sm-2" for="phone">Phone Number:</label>
					<div class="col-sm-9">
						<input type="Number" name="phone" style="background-color: transparent; color: white" class="form-control" required="" id="phone" placeholder="Enter Phone Number" pattern="[789][0-9]{9}" value="<?php echo $Phone; ?>">
					</div>
				</div><br>
				<div class="form-group">
					<label class="control-label col-sm-2" for="address">Address</label>
					<div class="col-sm-9">
						<textarea name="address" style="background-color: transparent;color: white" class="form-control" required="" id="address" placeholder="Enter Your Address">
						</textarea>
					</div>
				</div><br>
				<div class="form-group">
					<label class="control-label col-sm-2" for="desig">Designation:</label>
					<div class="col-sm-9">
						<input type="text" name="desig" style="background-color: transparent; color: white" class="form-control" id="desig" placeholder="Enter Designation" required="">
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

	<footer class="container-fluid text-center" id="foot">
		<div class="row">
			
		</div>
	</footer>

</body>
</html>