<!DOCTYPE html>
<html>
<head>
	<title>Digital Tourist Guide</title>
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
    background-image: url("img/banner.jpg");

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

</head>
<body>
	<?php
	include 'navbar.php';
	?>
	<div id="home" style="background: url(./img/digital1.jpg);padding-top: 95px;">
		<div class="landing-text">
			<div class="content w3-animate-top " style="padding-top: 2%">
			<div class="w3-card-4" style="padding-top: 8%;border:solid thin black;border-radius: 10px;border-color: green;box-shadow: 1px 1px 90px #fff;">
			<div class="w3-container" align="center">
				<h2><b style="color: #ffffff">LOGIN</b></h2><br><br>
			</div>
				<form action="logincheck.php" method="POST">
			  <div class="input-group" style="padding-left: 25px;padding-right: 25px">
			    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			    <input  type="text" class="form-control input-lg" name="username" placeholder="Username" id="username" required="" style="background-color: transparent; color: white" <?php if (isset($_get['error'])) {
			                 $username=$_POST['error'];
			                 echo "value='".$username."'";
			            } ?> />
			  </div><br><br><br>
			<div>
			  
			  <?php if (isset($_POST['error'])) {

			    echo "<label class='error'>Wrong username/password</label>";
			}
			  ?>
			</div>

			  <div class="input-group" style="padding-left: 25px;padding-right: 25px">
			    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			    <input id="password" type="password" class="form-control input-lg" name="password"  placeholder="Password" required="" style="background-color: transparent; color: white">
			  </div><br><br><br>
			  <div align="center">
			    <button class="btn btn-primary btn-lg" name="submit" type="submit">Submit</button><br><br><br>
			  </div>
			</form> 

			</div>
			</div>
		</div>		
	</div>

</body>
</html>