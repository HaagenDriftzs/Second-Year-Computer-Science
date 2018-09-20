<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http:www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http//www.w3.org/1999/xhtml" xml:lang="en" lang"en">
<head>
<meta http-equiv="content-type" content="text/html;charset=iso-8859-1"/>
<title>WebDb</title>
</head>
<body>
	<?php
	//This will end the session and bring the user back to the starting page
		session_start();
		session_destroy();
		header("Location: Startingpage.html");
	?>
</body>
</html>