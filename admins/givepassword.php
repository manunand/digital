<!DOCTYPE html>
<html lang="en">
<head>
	<title>Digital Tourist Guide | Assign Password</title>
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
<body class="bg">
	<?php include 'navbar.php'; ?>
	<div class="container-fluid">
		<div  class="container" style="width: 70%;background-color: transparent;  color: black; border:solid thin black;border-radius: 10px;">
			<h1 align="center" class="w3-animate-top">Add User Details</h1><br>
			<form  class="form-horizontal w3-animate-zoom" action="givepasswordscript.php" method="POST">
				
				<div class="form-group">
					<label class="control-label col-sm-2" for="id">ID</label>
					<div class="col-sm-9">
						<input type="text" style="background-color: transparent; color: white" name="id" class="form-control" required="" id="id" placeholder="Enter User Id">
					</div>
				</div><br>
				<div class="form-group">
					<label class="control-label col-sm-2" for="username">Username:</label>
					<div class="col-sm-9">
						<input type="text" name="username" style="background-color: transparent; color: white" class="form-control" id="username" placeholder="Enter New Username" required="">
					</div>
				</div><br>
				<div class="form-group">
					<label class="control-label col-sm-2" for="password">Password:</label>
					<div class="col-sm-9">
						<input type="password" name="password" style="background-color: transparent; color: white" class="form-control" id="password" placeholder="Enter New Password" required="">
					</div>
				</div><br>
				<div class="form-group">
					<label class="control-label col-sm-2" for="confirm"> Confirm Password:</label>
					<div class="col-sm-9">
						<input type="password" name="confirm" style="background-color: transparent; color: white" class="form-control" id="confirm" placeholder="Confirm Password" required="">
					</div>
				</div><br>				
				<div class="form-group">
					<div class="container" align="center">
						<button type="submit" class="btn btn-info" name="submit">Assign</button>
					</div>
				</div>
			</form>
			<?php include 'footer.php'; ?><?php include 'footer.php'; ?>
		</div>
	</div>
</body>
</html>