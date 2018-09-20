<!DOCTYPE html>

<!-- Assignmet 08/11/2017 TK -->

<html>
	<head>
		<title>Thomas Killeen</title>
		<meta charset="UTF-8">
		<meta name="keywords"    content="search, book">
		<meta name="description" content="Alows the user to search for books">
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
			session_start();
			//Connect to database library
			$con=mysqli_connect('localhost','','','library');
			//If there was a failure connecting to the library
				if (mysqli_connect_errno($con)) 
				{
					echo "failed to connect";
				}
				//Creates a variable to get the required information from the form and table book
				$result = mysqli_query($con,"SELECT * FROM book WHERE BookTitle = '".$_POST['Booktitle']."' AND Author = '".$_POST['Authorname']."'");				
				$count = mysqli_num_rows($result);//Creates a count for the number of tables needed
				if($count == 1) 
				{
					echo '<table border="1">'."\n";//Creates a table
					while ( $row = mysqli_fetch_array($result,MYSQLI_ASSOC) )//gets the info from the results variable  
					{
						echo "<tr><td>";
						echo $row['ISBN']; 
						echo("</td><td>");
						echo $row['BookTitle'];
						echo("</td><td>");
						echo $row['Author'];
						echo("</td><td>");
						echo $row['Edition'];
						echo("</td><td>");
						echo $row['Year'];
						echo("</td><td>");
						echo $row['Category'];
						echo("</td><td>");
						echo $row['Reserved'];
						echo("</td><td>");
						echo('<a href="./reserve.php?id=reserve.php'.htmlentities($row['ISBN'], $row['BookTitle'], $row['Author'], $row['Edition'], $row['Year'], $row['Category'], $row['Reserved']).'">Reserve</a>');//Provides a link to reserve
						echo("</td></tr>\n");
					}
					echo "</table>\n";//Ends the table
		      	}
		      else 
		      	{
		         	$_SESSION["error"] = "Missing Required Information";
		      	}
		?>
		<?php 
				$result1 =  mysqli_query($con,"SELECT * FROM book WHERE Category = '".$_POST['type']."'");
				$count1 = mysqli_num_rows($result);
				if($count == 1) 
				{
					echo '<table border="1">'."\n";
					while ( $row = mysqli_fetch_array($result1,MYSQLI_ASSOC) ) 
					{
						echo "<tr><td>";
						echo $row['ISBN']; 
						echo("</td><td>");
						echo $row['BookTitle'];
						echo("</td><td>");
						echo $row['Author'];
						echo("</td><td>");
						echo $row['Edition'];
						echo("</td><td>");
						echo $row['Year'];
						echo("</td><td>");
						echo $row['Category'];
						echo("</td><td>");
						echo $row['Reserved'];
						echo("</td><td>");
						echo('<a href="./reserve.php'.htmlentities($row['ISBN'], $row['BookTitle'], $row['Author'], $row['Edition'], $row['Year'], $row['Category'], $row['Reserved']).'">Reserve</a>');
						echo("</td></tr>\n");
					}
					echo "</table>\n";
		      	}
		      else 
		      	{
		         	$_SESSION["error"] = "Missing Required Information";
		      	}
		?>
		<form id="search" method="post">
					<fieldset>
						<legend>Search for a book</legend>
							Author Name:<br>
						<input type="text" name="Authorname" placeholder="Author Name">
							<br>
							Book Title:<br>
						<input type="text" name="Booktitle" placeholder="Book Title">
	  					<br><br>
						<input type="submit" name="Submit" value="Submit">
					</fieldset>
		</form>
		<form id="search" method="post">
					<fieldset>
							Category:<br>
						<select name="type">
							<option value="1">Health</option>
	  						<option value="2">Business</option>
	  						<option value="3">Biography</option>
	  						<option value="4">Technology</option>
	  						<option value="5">Travel</option>
	  						<option value="6">Self Help</option>
	  						<option value="7">Cookery</option>
	  						<option value="8">Fiction</option>
	  					</select>
	  					<br><br>
						<input type="submit" name="Submit2" value="Submit">
					</fieldset>
		</form>
		<div>
		<p><a href="./Logout.php">Logout</a></p>
		</div>
		<footer><p>Copyright&copy; Thomas Killeen <q>The main man!</q>&trade;</p></footer>
	</body>
</html>