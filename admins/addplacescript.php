<?php
ini_set('display_errors', 1);
error_reporting (E_ALL);
include '../config.php';
$servername ="localhost";
$username= "root";
$password= "password";
$dbname = "digital";

$conn = mysqli_connect($servername, $username, $password,$dbname );

if ($conn->connect_error) {
    die("Connection failed: " .mysqli_connect_error());
}

if (isset($_POST['submit'])) {
	$placename =($_POST['placename']);
	$placedesc =($_POST['placedesc']);
}

$query="insert into places(user_id,place_name,description) values('$id','$placename','$placedesc')";
/*$res=$conn->query($query);*/
$res = mysqli_query($conn,$query);
if(mysqli_affected_rows($conn)>0) {
	include('./phpqrcode/qrlib.php');

    // how to save PNG codes to server
    
    $tempDir = "qrcodes/";
    
    $codeContents = $placename;
    
    // we need to generate filename somehow, 
    // with md5 or with database ID used to obtains $codeContents...
    $fileName = $placename.'.png';
    
    $pngAbsoluteFilePath = $tempDir.$fileName;
    $urlRelativeFilePath = $tempDir.$fileName;
    
    // generating
    if (!file_exists($pngAbsoluteFilePath)) {
        QRcode::png($codeContents, $pngAbsoluteFilePath);
        echo 'File generated!';
        echo '<hr />';
    } else {
        echo 'File already generated!';
        echo '<hr />';
    }
    
    echo 'Server PNG File: '.$pngAbsoluteFilePath;
    echo '<hr />';
    
    // displaying
    echo '<img src="'.$urlRelativeFilePath.'" />';

	?><br><br><br>
	<div class="alert alert-success">
  		<strong>Success!</strong> Your response has been successfully recorded.Thank you.
		<meta http-equiv="refresh" content="6;url=index.php" />
	</div>

	<?php
}
else {
	?>
	<br><br><br>
	<div class="alert alert-danger">
  		<strong>Sorry!</strong> Please try to re enter your details. Please make sure details are unique.
  		<meta http-equiv="refresh" content="7;url=addplace.php" />
	</div>
	<?php
} 
?>