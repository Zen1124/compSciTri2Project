<?php
	session_start();

	$_SESSION["firstName"] = $_POST['fname'];

	echo "Welcome " . $_SESSION["firstName"];

?>
<body style="background-color:#afaeee;">

<p><a href="index.php">Return to Main Page</a></p>

</body>
