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
		<a href="history.php">History</a>
	</div>
	<div class="bg3">
		<div class="main2">
		<p class="sign" align="center">Post Daily Trips</p>
		<form class="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    
			<input class="un1" type="text" align="center" placeholder="Enter current location" name="c_l" required>
			<input class="un1 " type="text" align="center" placeholder="Enter destination" name="c_dest" required>
			<input class="un1" type="text" align="center" placeholder="Enter vehicle load discription" name="c_load" required>
			<input class="un1" type="text" align="center" placeholder="Enter weight" name="c_weigt"required>
			<input class="un1 " type="text" align="center" placeholder="Enter kilometer" name="c_km" required>
			<input class="un1 " type="text" align="center" placeholder="Enter Rates by kilometer" name="c_rate" required>
		
		
			<a> <input type="submit" class="submit" align="center" style="margin-left: 45%;" name="register"></a>
		  </div>        
    </div>
	<div class="footer">
			<h2>Footer</h2>
	</div>
     

<?php
		session_start();
		//including the database connection file
        $databaseHost     = 'localhost';
		$databaseName     = 'project';
		$databaseUsername = 'root';
		$databasePassword = 'chetan';

		$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

        // Check If form submitted, insert user data into database.
        if (isset($_POST['register'])) 
		{
            $l = $_POST['c_l'];
            $d = $_POST['c_dest'];
            $ld= $_POST['c_load'];
			$w = $_POST['c_weigt'];
			$k = $_POST['c_km'];
            $r= $_POST['c_rate'];
			$email=$_SESSION['username'];
           $s='not booked';
		   
                // Insert user data into database
                $result   = mysqli_query($mysqli, "INSERT INTO booking(c_l,c_dest,c_load,c_weight,c_km,c_rate,u_name,b_name,stat) VALUES('$l','$d','$ld','$w','$k','$r','$email','null','not booked')");
               $res  = mysqli_query($mysqli, "INSERT INTO trip(c_l,c_dest,c_load,c_weight,c_km,c_rate) VALUES('$l','$d','$ld','$w','$k','$r')");
			   // check if user data inserted successfully.
				if ($res) {
						
						echo "<br/><br/>User Registered successfully.";
						
					}
				if ($result) {
						header("location:user.php");
						echo "<br/><br/>User Registered successfully.";
						
					}
					else 
					{
                    echo "Registration error. Please try again." . mysqli_error($mysqli);
					}
            
        }

        ?>
    </form>
</body>

</html>