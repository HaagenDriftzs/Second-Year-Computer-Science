<!DOCTYPE html>

<!-- Assignmet 08/11/2017 TK -->

<html>
	<head>
		<title>Thomas Killeen</title>
		<meta charset="UTF-8">
		<meta name="keywords"    content="view, reserved">
		<meta name="description" content="Shows the user what books are reserved">
		<meta name="author"      content="Thomas Killeen">
		<link rel="stylesheet" type="text/css" href="./css/mystyles.css">
	</head>
	<body>
		<header>Library Reservation</header>
		<nav>
			<ul id= "menu" class="menu">
					<li><a href="./homepage.php">Homepage</a></li>
	  				<li><a href="./search.php">Search</a></li>
					<li><a href="./View.php">View Reserved Books</a></li>
			</ul>
		</nav>
		<?php
			//Connect to database library
			session_start();
			$con=mysqli_connect('localhost','','','library');
			//If there was a failure connecting to the library
			if (mysqli_connect_errno($con)) 
			{
				echo "failed to connect";
			}
			echo '<table border="1">'."\n";//Creates a table
			$result = mysqli_query($con,"SELECT * FROM reservations");//creates a variable that contains everything from the reservations table
			while ( $row = mysqli_fetch_array($result) )//Shows the ammount in the table 
			{
				echo "<tr><td>";
				echo $row['ISBN']; 
				echo("</td><td>");
				echo $row['Username'];
				echo("</td><td>");
				echo $row['ReservedDate'];
				echo("</td></tr>\n");
			}
			echo "</table>\n";//Ends table
		?>
	<div>
		<p><a href="./Logout.php">Logout</a></p>
	</div>
		<footer><p>Copyright&copy; Thomas Killeen <q>The main man!</q>&trade;</p></footer>
	</body>
</html>