<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="icon" href="../img/general.png">	
</head>
<body>
	<?php 
		include 'links.php';
		include '../config.php';
	 ?>
<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-main">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><img src="../img/digitalogo.png" style="height: 100%;padding-left: 15%;"><!-- Digital Tourist Guide --></a>
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse-main">
				<ul class="nav navbar-nav navbar-right">
					<li><a class="active" href="index.php">Home</a></li>
					<li><a href="addadmin.php">Add Admin</a></li>
					<li><a href="viewadmin.php">View Admin</a></li>
					<li><a href="givepassword.php">Password Permission</a></li>
					<li><a href="addplace.php">Add Place</a></li>
					<li><a href="addmedia.php">Add Media</a></li>
					<li><a href="viewplace.php">View Place</a></li>
					<li class="dropdown">
			          <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="font-size: 15px"><b>Hello <?php echo $username; ?>
			          </b><span class="caret"></span></a>
			          <ul class="dropdown-menu" style="background-color: transparent;">
			           <li><a href="editprofile.php" style="font-size: 15px;color: black;"><b>Edit Profile</b></a></li>
			           <li><a href="changepassword.php" style="font-size: 15px;color: black;"><b>Change Password</b></a></li>
			           <li><a href="logout.php" style="font-size: 15px;color: black;"><span class="glyphicon glyphicon-log-out"></span><b>Logout</b></a></li>
			          </ul>
			        </li>
				</ul>
			</div>
		</div>
	</nav>
</body>
</html>