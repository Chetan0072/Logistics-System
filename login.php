<html>

<head>
  <link rel="stylesheet" href="log.css">
  
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Sign in</title>
</head>

<body>
<div class="topnav">
		<a class="active" href="main.php">Home</a>
		<a href="#about">About</a>
	</div>
	<div class="bg1">
  <div class="main">
    <p class="sign" align="center">Sign in</p>
    
	<form class="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
      <input class="un " type="text" align="center" placeholder="Email id" name="email" >
      <input class="pass" type="password" align="center" placeholder="Password" name="pass">
       
	     <a> <input type="submit" class="submit" align="center" name="register"></a>
      <p class="forgot" align="center"><a href="#">Forgot Password?</p>
	  <p class="forgot" align="center"><a href="register.php">Sing Up</p>
            
                
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
            
            $email    = $_POST['email'];
            $password = $_POST['pass'];
			

            // If email already exists, throw error
            $email_result = mysqli_query($mysqli, "select 'email' from users where email='$email' and password='$password'");

            // Count the number of row matched 
            $user_matched = mysqli_num_rows($email_result);

            // If number of user rows returned more than 0, it means email already exists
				if ($user_matched >0)
				{
						$_SESSION['username'] = $email;
                          header("location:book.php");
							// echo "<br/><br/><strong>Error: </strong> User already exists with the email id '$email'.";
				}
				else 
				{
					echo '<script>alert("Login Id And Password does not exist")</script>'; 
				}
        }

        ?>
    </form>
</body>

</html>