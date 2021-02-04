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
		<a href="test.php">History</a>
	</div>
	<div class="bg3">
		<div class="main3">
		<p class="sign" align="center">Search Daily Trips</p>
		<form class="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    
			<input class="un" type="text" align="center" placeholder="Enter current location" name="c_l" required>
			<input class="un " type="text" align="center" placeholder="Enter destination" name="c_dest" required>
			
		
		
			<a> <input type="submit" class="submit" align="center"  name="register"></a>
		  </div>        
    
	
 <?php
 session_start();
$servername = "localhost";
$username = "root";
$password = "chetan";
$dbname = "project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['register']))
		{
			 $l    = $_POST['c_l'];
			 $d=$_POST['c_dest'];
$sql = "SELECT id,c_l,c_dest,c_load,c_weight,c_km,c_rate FROM booking WHERE c_l='$l' and c_dest='$d' and stat <> 'Booked'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
	  echo "<font color=white><h2>id: " . $row["id"]. "<br> current location :- " . $row["c_l"]. "<br> Destination:- " . $row["c_dest"]. "<br> Load discription " . $row["c_load"]. "<br> Weight :- " . $row["c_weight"]. " tones<br> Distance :-" . $row["c_km"]. "km<br> Rate:- " . $row["c_rate"]. " <br></h2>";
    
  }?>
  <button class="submit" onclick="location.href='userl.php'">Book Your Trip</button><?php
} else {
  echo "0 results";
}
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