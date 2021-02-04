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
		<p class="sign" align="center">Book Your Trips</p>
		<form class="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    
			<input class="un" type="text" align="center" placeholder="Enter trip ID" name="id" required>
			<a> <input type="submit" class="submit" align="center" " name="register"></a>
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
			$email=$_SESSION['username'];
            $id = $_POST['id'];
          // 	$result   = mysqli_query($mysqli, "INSERT INTO book(id,name) VALUES('$v','$email')");		
			$sql="UPDATE booking SET b_name='$email',stat='Booked'  Where id='$id'";
			$result = $mysqli->query($sql);
				if ($result)
				{
					header("location:book.php");
				}
         
		
		
           
		}

        ?>
		    </div>
	<div class="footer">
			<h2>Footer</h2>
	</div>
    </form>
</body>

</html>