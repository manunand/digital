<!DOCTYPE html>
<html>
<head>
  <title>Digital Tourist Guide | Edit Place description</title>
</head>
<body class="bg">
  <?php
  include 'navbar.php';
  ?>

  <div class="container " style="border:solid thin black;border-radius: 10px;padding-bottom: 5%;">
    <form method="POST" action="editplace.php">
      <div class="container">
        <h2 class="well well-sm" style="background-color:transparent; animation-duration: 3s;text-shadow:1px 1px 8px black; color: white"><b>Edit Place Description</b></h2><br>
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
        </div>
        </form>
        <form method="POST" action="editplace.php">
        <div>
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
              <input type="hidden" name="id_place" value="<?php echo $place_id; ?>" id="id_place">
              <div align="center">
                <div class="form-group">
                <label class="control-label col-sm-2" for="placename">Name:</label>
                <div class="col-sm-9">
                  <input type="text" name="placename" style="background-color: transparent;" class="form-control" id="placename" placeholder="Enter Place Name" required="" value="<?php echo $row['place_name']; ?>" disabled>
                </div>
              </div><br><br><br>
              <div class="form-group">
                <label class="control-label col-sm-2" for="placedesc">Description :</label>
                <div class="col-sm-9">
                  <textarea name="placedesc" style="background-color: transparent;;" class="form-control" required="" id="placedesc" placeholder="Enter Place Description"><?php echo $row['description']; ?></textarea>
                </div>
              </div><br><br><br><br>
              <div class="form-group">
                <div class="container" align="center">
                  <button type="change" class="btn btn-info" name="change">Change</button>
                </div>
              </div>
                <h1></h1>
                <h4></h4>
              </div>
              <?php
            }            
            $conn-> close();
          }
          if (isset($_POST['change'])) {
            $place =($_POST['id_place']);
            $description = ($_POST['placedesc']);

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
            
            $a = $place;
            $b = $description;

            /*$sql="select * from places where id='".$place."' ";
            $result=mysqli_query($conn, $sql);
            if ($result-> num_rows >0) {
              $row= $result-> fetch_assoc();
              echo $row['id'];
              echo $row['description'];
            }*/

            $query="update places set description='".$b."' where id like '".$a."'";
            $res = mysqli_query($conn,$query);
            if(mysqli_affected_rows($conn)>0) {
              ?><br>
              <div class="alert alert-success">
                  <strong>Success!</strong> Your response has been successfully updated.
                <meta http-equiv="refresh" content="2;url=index.php" />
              </div>

              <?php
            }
            else {
              ?>
              <br>
              <div class="alert alert-danger">
                  <strong>Sorry!Same Data</strong>Nothing is Updated.Thank you
                  <meta http-equiv="refresh" content="2;url=editplace.php" />
              </div>
              <?php
            }            
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