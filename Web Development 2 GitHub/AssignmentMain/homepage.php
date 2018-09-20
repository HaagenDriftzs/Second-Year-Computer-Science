<!DOCTYPE html>

<!-- Assignmet 08/11/2017 TK -->

<html>
	<head>
		<title>Thomas Killeen</title>
		<meta charset="UTF-8">
		<meta name="keywords"    content="homepage, links">
		<meta name="description" content="A page that links to other pages on the site">
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
		?>
	<div>
		<p><a href="./logout.php">Logout</a></p>
	</div>
		<footer><p>Copyright&copy; Thomas Killeen <q>The main man!</q>&trade;</p></footer>
	</body>
</html>