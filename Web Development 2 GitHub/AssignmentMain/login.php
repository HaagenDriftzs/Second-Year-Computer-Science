<!DOCTYPE html>

<!-- Assignmet 08/11/2017 TK -->

<html>
	<head>
		<title>Thomas Killeen</title>
		<meta charset="UTF-8">
		<meta name="keywords"    content="login, data, form">
		<meta name="description" content="A page that allows the user to login to the site">
		<meta name="author"      content="Thomas Killeen">
		<link rel="stylesheet" type="text/css" href="./css/mystyles.css">
	</head>
	<body>
	<header>Library Reservation</header>
	<?php 
		//Creates a connection to the database library
		$con=mysqli_connect('localhost','','','library');
				//Tests connection to see if it has connected
				if (mysqli_connect_errno($con)) 
				{
					echo "failed to connect";
				}
				//The variable result creates a query statement to get information from the users table
				$result = mysqli_query($con,"SELECT * FROM users WHERE Username = '".$_POST['username']."' AND Password = '".$_POST['password']."'");
				//Creates a count variable from the num rows from the variable result
				$count = mysqli_num_rows($result);
				if($count == 1) 
				{
					session_start();//Starts a session
		         	$_SESSION["username"] = $_SESSION["username"]+1;//Creates a session variable by the username added +1 to access an if
					header( 'Location: homepage.php' ) ;//Moves the user to the next php page
		      	}
		      else 
		      	{
		         	$_SESSION["error"] = "Missing Required Information";//If there was an error with required information
		      	}
		mysqli_close($con);//Closes connection
	?>
	<form id="username" action="login.php" method="post">
					<fieldset>
						<legend>Login</legend>
							Username:<br>
						<input type="text" name="username" placeholder="Username">
							<br>
							Password:<br>
						<input type="password" name="password" placeholder="Password">
							<br><br>
						<input type="submit" name="Submit" value="Submit">
					</fieldset>
		</form>
	<div>
		<a href="./StartingPage.html">Back to starting page</a>
	</div>
		<footer><p>Copyright&copy; Thomas Killeen <q>The main man!</q>&trade;</p></footer>
	</body>
</html>