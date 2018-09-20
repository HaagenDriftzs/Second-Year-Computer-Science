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
		<?php session_start();
		$con=mysqli_connect('localhost','','','library');
		if (mysqli_connect_errno($con)) 
		{
			echo "failed to connect";
		}
		$result = mysqli_query($con,"SELECT * FROM book");
		$result1 = mysqli_query($con1,"SELECT * FROM book");
		unset($_SESSION["Authorname"]);
		if(isset($_POST['Authorname'])
		{
			$_SESSION["Authorname"] = $_POST["Author"];
			while($row=mysql_fetch_array($result))
			{ 
				echo $row['ProductID'] . " " . $row['PName'] . " " . $row['Description'] . " " . $row['Price'] . " " . $row['Stock'];
				echo "<br>" . "<br>";
				echo('<a href="Reserve.php?id='.htmlentities($row['ProductID'], $row['PName'], $row['Description'], $row['Price'], $row['Stock']).'">Reserve</a>/');
			}
		}
		else
		{
			$_SESSION["error"] = "Missing Required Information";
			return;
		}
		if(isset($_POST['Booktitle'])
		{
			$_SESSION["Booktitle"] = $_POST["Booktitle"];
			while($row=mysql_fetch_array($result))
			{ 
				echo $row['ProductID'] . " " . $row['PName'] . " " . $row['Description'] . " " . $row['Price'] . " " . $row['Stock'];
				echo "<br>" . "<br>";
				echo('<a href="Reserve.php?id='.htmlentities($row['ProductID'], $row['PName'], $row['Description'], $row['Price'], $row['Stock']).'">Reserve</a>/');
			}
		}
		else
		{
			$_SESSION["error"] = "Missing Required Information";
			return;
		}
		if(isset($_POST['Catagory'])
		{
			$_SESSION["Catagory"] = $_POST["Catagory"];
			while($row=mysql_fetch_array($result1))
			{ 
				echo $row['ProductID'] . " " . $row['PName'] . " " . $row['Description'] . " " . $row['Price'] . " " . $row['Stock'];
				echo "<br>" . "<br>";
				echo('<a href="Reserve.php?id='.htmlentities($row['ProductID'], $row['PName'], $row['Description'], $row['Price'], $row['Stock']).'">Reserve</a>/');
			}
		}
		else
		{
			$_SESSION["error"] = "Missing Required Information";
			return;
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
							<br>
							Level:<br>
						<select name="Catagory">
							<option value="Health">Health</option>
	  						<option value="Business">Business</option>
	  						<option value="Technology">Technology</option>
	  						<option value="Travel">Travel</option>
	  						<option value="Selfhelp">Self Help</option>
	  						<option value="Cookery">Cookery</option>
	  						<option value="Fiction">Fiction</option>
	  					</select>
	  					<br><br>
						<input type="submit" name="Submit" value="Submit">
					</fieldset>
		</form>
		<p><a href="./Logout.php">Logout</a></p>
		<footer><p>Copyright&copy; Thomas Killeen <q>The main man!</q>&trade;</p></footer>
	</body>
</html>