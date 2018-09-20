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
		$con=mysqli_connect('localhost','root','','library');
		if (mysqli_connect_errno($con)) 
		{
			echo "failed to connect" . mysqli_connect_error();
		}
		/*$result = mysqli_query($con,"SELECT * FROM users");
		require_once "Regestration.php";
		if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['firstName']) && isset($_POST['lastName'])
		&& isset($_POST['address']) && isset($_POST['city']) && isset($_POST['phoneno']) && isset($_POST['mobileno'])) 
		{
			$un = $_POST['username'];
			$p = $_POST['password'];
			$fn = $_POST['firstName'];
			$ln = $_POST['lastName'];
			$add = $_POST['address'];
			$c = $_POST['city'];
			$pn = $_POST['phoneno'];
			$mn = $_POST['mobileno'];
			$result = "INSERT INTO users (Username, Password, FirstName, Surname, AddressLine, City, Telephone, Mobile)
			VALUES ('$un', '$p', '$fn', '$ln', '$add', '$c', '$pn', 'mn')";
			echo "<pre>\n$con\n</pre>\n";
			mysqli_query($con);
			header( 'Location: Login.php' ) ;
		}*/
		$sql = "INSERT INTO users (Username, Password, FirstName, Surname, AddressLine, City, Telephone, Mobile) 
		VALUES 
		('$_POST['username']', '$_POST['password']', '$_POST['firstName']', '$_POST['lastName']', '$_POST['address']', '$_POST['city']', '$_POST['phoneno']', '$_POST['mobileno']')";
		
		if(!mysqli_query($con,$sql))
		{
			die('Error: ' . mysqli_error());
		}
		header('Location: Login.php');
		mysqli_close($con);
?>
		<form id="fullname" action="regestration.php" method="post">
			<fieldset>
				<legend>Sign up</legend>
				<div>
					Username:
					<input type="text" name="username" required placeholder="Username">
				</div>
				<div>
					Password:
					<input type="password" name="password" required placeholder ="Password">
				</div>
				<div>
					First Name:
					<input type="text" name="firstname" required placeholder="First Name">
				</div>
				<div>
					Last Name:
					<input type="text" name="lastName" required placeholder ="Last Name">
				</div>
				<div>
					Address:
					<input type="text" name="address" required placeholder ="Address">
				</div>
				<div>
					City:
					<input type="text" name="city" required placeholder ="city">
				</div>
				<div>
					Phone No:
					<input type="number" name="phoneno" required placeholder="Phone No">
				</div>
				<div>
					Mobile No:
					<input type="number" name="mobileno" required placeholder="Phone No">
				</div>
				<div>
					<input type="submit" name="Submit" value="Submit">
				</div>
			</fieldset>
			</form>
		<p><a href="StartingPage.php">Return back to starting page</a></p>
		<footer><p>Copyright&copy; Thomas Killeen <q>The main man!</q>&trade;</p></footer>
	</body>
</html>