<!DOCTYPE html>

<!-- Assignmet 08/11/2017 TK -->

<html>
	<head>
		<title>Thomas Killeen</title>
		<meta charset="UTF-8">
		<meta name="keywords"    content="reserve">
		<meta name="description" content="Php to reserve a book, does not work">
		<meta name="author"      content="Thomas Killeen">
		<link rel="stylesheet" type="text/css" href="./css/mystyles.css">
	</head>
	<body>
		<?php
		//Connect to database library
		$con=mysqli_connect('localhost','','','library');
		//If there was a failure connecting to the library
		if (mysqli_connect_errno($con)) 
		{
			echo "failed to connect";
		}
		//The variable result gets all from the table book
		$result = mysqli_query($con,"SELECT * FROM book");
		if(isset($_GET['ISBN']) && isset($_GET['Reserved']))//If the information from the previous page matches
		{
			$is = mysqli_real_escape_string($_POST['ISBN']);//Creates a variable for the ISBN
			$sql = "UPDATE book set Reserved = 'Y' where ISBN = '$IS'";//Updates the table from where the ISBN is the same  and changes the reserved to Y
			mysql_query($sql);
			$sql = "INSERT INTO Reservations (ISBN, Username, ReservedDate)
            VALUES ('$IS', '$_SESSION[Username]', '11-OCT-2008');";//Then inserts the values into the Reservations table			
			return;
			header( 'Location: homepage.php');
		}

		?>
	</body>
</html>