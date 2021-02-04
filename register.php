<?php

/**
 * Name: Simple PHP Login & Registration Script
 * Tutorial: https://tutorialsclass.com/code/simple-php-login-registration-script
 */
?>

<html>
<head>
    <title>Register</title>
</head>
<head>
  <link rel="stylesheet" href="log.css">
  
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  
</head>
<body>
<div class="topnav">
		<a class="active" href="main.php">Home</a>
		<a href="#about">About</a>
	</div>
	<div class="bg3">
  <div class="main1">
    <p class="sign" align="center">Sign Up</p>
	<form class="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    
        <input class="un " type="text" align="center" placeholder="Enter name" name="name">
	   <input class="un " type="text" align="center" placeholder="Enter name" name="email">
      <input class="pass" type="password" align="center" placeholder="Password" name="password" maxlength=8>
	  <input class="pass" type="password" align="center" placeholder=" Confirm Password" name="confpassword" maxlength=8>
		
		
		<a> <input type="submit" class="submit" align="center" name="register"></a>
		
		
		
		
      
      </div>        
    </div>
	<div class="footer">
			<h2>Footer</h2>
		</div>
     

        <?php
		
        //including the database connection file
        $databaseHost     = 'localhost';
		$databaseName     = 'project';
		$databaseUsername = 'root';
		$databasePassword = 'chetan';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

        // Check If form submitted, insert user data into database.
        if (isset($_POST['register']))
		{
            $name     = $_POST['name'];
            $email    = $_POST['email'];
            $password = $_POST['password'];
			$confpassword = $_POST['confpassword'];
			
				if( $password != $confpassword )
				{
					echo '<script>alert("Password And confpassword does not Matching")</script>'; 
				}
				else
				{

					// If email already exists, throw error
					$email_result = mysqli_query($mysqli, "select 'email' from users where email='$email' and password='$password'");

					// Count the number of row matched 
					$user_matched = mysqli_num_rows($email_result);

					// If number of user rows returned more than 0, it means email already exists
					if ($user_matched > 0) 
					{
						echo '<script>alert("User already exists with This email id ")</script>'; 
						
					} 
					else 
					{
						// Insert user data into database
						$result   = mysqli_query($mysqli, "INSERT INTO users(name,email,password,confpassword) VALUES('$name','$email','$password',$confpassword)");

						// check if user data inserted successfully.
						if ($result) 
						{
							header("location:login.php");
								echo "<br/><br/>User Registered successfully.";
						} 
						else
							{
							echo "Registration error. Please try again." . mysqli_error($mysqli);
							}
					}
				}
        }

        ?>
    </form>
</body>

</html>