<!DOCTYPE html>

<!-- Assignmet 08/11/2017 TK -->

<html>
	<head>
		<title>Thomas Killeen</title>
		<meta charset="UTF-8">
		<meta name="keywords"    content="Temp">
		<meta name="description" content="Temp">
		<meta name="author"      content="Thomas Killeen">
		<link rel="stylesheet" type="text/css" href="./css/mystyles.css">
	</head>
	<body>
		<header>Library Reservation</header>
		<?php
		$con=mysqli_connect('localhost','','','library');
				if (mysqli_connect_errno($con)) 
				{
					echo "failed to connect";
				}
				$result = mysqli_query($con,"SELECT * FROM users WHERE Username = '".$_POST['username']."' AND Password = '".$_POST['password']."'");
				$count = mysqli_num_rows($result);
				if($count == 1) 
				{
					session_start();
		         	$_SESSION["Username"] = $_POST["username"];
					$_SESSION["success"] = "Logged in.";
					header( 'Location: homepage.php' ) ;
		      	}
		      else 
		      	{
		         	$_SESSION["error"] = "Missing Required Information";
		      	}
	?>
		<form id="username" method="post">
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
		<p><a href="StartingPage.php">Return back to starting page</a></p>
		<footer><p>Copyright&copy; Thomas Killeen <q>The main man!</q>&trade;</p></footer>
	</body>
</html>