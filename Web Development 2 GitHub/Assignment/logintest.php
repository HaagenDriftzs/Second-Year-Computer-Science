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
		<?php session_start();
		$con=mysqli_connect('localhost','','','library');
		if (mysqli_connect_errno($con)) 
		{
			echo "failed to connect";
		}
		$mainusername = mysqli_real_escape_string($con,$_POST['username']);
		$mainpassword = mysqli_real_escape_string($con,$_POST['password']);
		$sql = "SELECT library FROM users WHERE Username = '$mainusername' and Password = '$mainpassword'";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$active = $row['active'];
		if($count == 1)
		{
			session_register("mainusername");
			$_SESSION['login'] = $mainusername;
			header("location: HomePage.php");
		}
		else
		{
			$error = "Your login is invalid";
		}
	?>
		<form id="Loginfunc" method="post">
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