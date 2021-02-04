<?php

/**
 * Name: Simple PHP Login & Registration Script
 * Tutorial: https://tutorialsclass.com/code/simple-php-login-registration-script
 */
?>

<html>
<head>
    <title>transport</title>
</head>
<head>
  <link rel="stylesheet" href="log.css">
  
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  
</head>
<body>
<div class="topnav">
		<a class="active" href="logout.php">Logout</a>
		<a href="book.php">Home</a>
	</div>
	<div class="bg4">
       <?php
 session_start();
$servername = "localhost";
$username = "root";
$password = "chetan";
$dbname = "project";
$email=$_SESSION['username'];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id,c_l,c_dest,c_load,c_weight,c_km,c_rate,u_name,stat FROM booking WHERE b_name='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "<font color=white><h2>id: " . $row["id"]. "<br> current location :- " . $row["c_l"]. "<br> Destination:- " . $row["c_dest"]. "<br> Load discription :-" . $row["c_load"]. "<br> Weight :- " . $row["c_weight"]. " tones<br> Distance :-" . $row["c_km"]. "km<br> Rate:- " . $row["c_rate"]. " Rs<br> company name:- ". $row["u_name"]."<br> status:- ". $row["stat"]."<br></h2>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>  		
 
	
    
     

</div>
<div class="footer">
			<h2>Footer</h2>
		</div>
	</form>
</body>

</html>