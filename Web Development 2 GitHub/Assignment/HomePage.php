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
		<nav>
			<ul id= "menu" class="menu">
	  				<li><a href="./Search.php">Search</a></li>
					<li><a href="#Reserve">Reserve</a></li>
					<li><a href="./View.php">View Reserved Books</a></li>
			</ul>
		</nav>
		<?php
		$con=mysqli_connect('localhost','','','library');
		if (mysqli_connect_errno($con)) 
		{
			echo "failed to connect";
		}
		$result = mysqli_query($con,"SELECT * FROM book");
		while ( $row = mysqli_fetch_array($result) ) 
		{
			echo $row['ISBN'] . " " . $row['BookTitle'] . " " . $row['Author'] . " " . $row['Edition'] . " " . $row['Year'] . " " . $row['Category'] . " " . $row['Reserved'];
			echo "<br>" . "<br>";
			echo('<a href="Reserve.php?id='.htmlentities($row['ISBN'], $row['BookTitle'], $row['Author'], $row['Edition'], $row['Year'], $row['Category'], $row['Reserved']).'">Reserve</a>/');
		}
		echo "</table>\n";
		?>
		<p><a href="./Logout.php">Logout</a></p>
		<footer><p>Copyright&copy; Thomas Killeen <q>The main man!</q>&trade;</p></footer>
	</body>
</html>