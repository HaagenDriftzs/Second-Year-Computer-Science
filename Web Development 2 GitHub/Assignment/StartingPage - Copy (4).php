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
		<?php
			session_start();
			$checkuser = $_SESSION['login'];
			$ses_sql = mysqli_query($con,"select Username from users where Username = '$checkuser'");
			$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
			$loginSession = $row['username'];
			if(!isset($_SESSION['login']))
			{
				header("location:Login.php");
			}
		?>
	</body>
</html>