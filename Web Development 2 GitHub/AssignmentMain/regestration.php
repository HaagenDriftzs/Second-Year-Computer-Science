<!DOCTYPE html>

<!-- Assignmet 08/11/2017 TK -->

<html>
	<head>
		<title>Thomas Killeen</title>
		<meta charset="UTF-8">
		<meta name="keywords"    content="Regestration, data, form">
		<meta name="description" content="A page that allows the user to register a new user">
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
		//Creates a variable called sql that inserts the information given by the form into the table users
		$sql = "INSERT INTO users (Username, Password, FirstName, Surname, AddressLine, City, Telephone, Mobile) 
		VALUES 
		('$_POST[username]', '$_POST[password]', '$_POST[firstname]', '$_POST[lastName]', '$_POST[address]
			', '$_POST[city]', '$_POST[phoneno]', '$_POST[mobileno]')";
		
		if(!mysqli_query($con,$sql))
		{
			die('Error: ' . mysqli_error());
		}
		mysqli_close($con);
	?>
	<form id="fullname" method="post">
			<fieldset>
				<legend>Sign up</legend>
					Username:<br>
					<input type="text" name="username" required placeholder="Username">
					<br>
					Password:<br>
					<input type="password" name="password" required placeholder ="Password">
					<br>
					First Name:<br>
					<input type="text" name="firstname" required placeholder="First Name">
					<br>
					Last Name:<br>
					<input type="text" name="lastName" required placeholder ="Last Name">
					<br>
					Address:<br>
					<input type="text" name="address" required placeholder ="Address">
					<br>
					City:<br>
					<input type="text" name="city" required placeholder ="city">
					<br>	
					Phone No:<br>
					<input type="number" name="phoneno" required placeholder="Phone No">
					<br>
					Mobile No:<br>
					<input type="number" name="mobileno" required placeholder="Phone No">
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