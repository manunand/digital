<!DOCTYPE html>
<html>
<head>
	<title>Digital Tourist Guide | Add Media</title>
	
</head>
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
.centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
label
{
	font-size: 15px;
}
</style>
<body class="bg">
<?php 
include ('navbar.php');
 ?>
<div>
  <div class="col-sm-6" style="padding-top: 2%;" align="center">
    <div style="padding-top: 8%;padding-bottom: 8%;border:solid thin black;border-radius: 10px;border-color: green;box-shadow: 1px 1px 90px #fff;">
      <div class="w3-container" align="center">
        <h2><b style="color: #ffffff">Upload video</b></h2><br><br>
      </div>
      <form method="POST" role="form" enctype="multipart/form-data" action="addmediascript.php">
        <div class="form-group">
          <label class="control-label col-sm-2" for="sub_id">Select Place :</label>
          <div class="col-sm-9">
          <select name="place_id" class="form-control" id="place_id" required="" style="background-color: transparent;">
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
                $sql="select * from places order by place_name";
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
      </div><br><br><br><br>
        <div class="form-group">
          <label class="control-label col-sm-3" for="video_file" style="text-align: right;"><b>Choose File:</b></label>
          <div class="col-sm-8">
            <input type="file" name="video_file" id="video_file" accept="video/*" style="background-color: transparent;" required=""/>
          </div><br><br>
        </div><br>
        <div align="center">
          <button class="btn btn-primary btn-lg" name="video_upload" type="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>



<div>
  <div class="col-sm-6" style="padding-top: 2%;" align="center">
    <div style="padding-top: 8%;padding-bottom: 8%;border:solid thin black;border-radius: 10px;border-color: green;box-shadow: 1px 1px 90px #fff;">
      <div class="w3-container" align="center">
        <h2><b style="color: #ffffff">Upload Image</b></h2><br><br>
      </div>
      <form method="POST" role="form" enctype="multipart/form-data" action="addmediascript.php">
        <div class="form-group">
          <label class="control-label col-sm-2" for="sub_id">Select Place :</label>
          <div class="col-sm-9">
          <select name="place_id" class="form-control" id="place_id" required="" style="background-color: transparent;">
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
                $sql="select * from places order by place_name";
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
      </div><br><br><br><br>
        <div class="form-group">
          <label class="control-label col-sm-3" for="image_file" style="text-align: right;"><b>Choose File:</b></label>
          <div class="col-sm-8">
            <input type="file" name="image_file" id="image_file" accept="image/*" style="background-color: transparent;" required=""/>
          </div><br><br>
        </div><br>
        <div align="center">
          <button class="btn btn-primary btn-lg" name="image_upload" type="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>