<?php

	session_start();

?>
<!doctype html>
<html>
	<head>
		<title>Session Demonstration</title>
	</head>

	<body style="background-color:#afaeee;">

		<form action="setSessionVariable.php" method="post">
			<div>Enter your First Name: <input name="fname"></div>
			<div><input type="submit" value="Submit" name="submit"></div>

		</form>

	</body>
</html>
