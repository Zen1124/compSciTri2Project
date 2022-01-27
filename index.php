<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RaiderRater</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body style="background-color:#afaeee;">

<?php

	#Connect to database server
	//$dbc = mysqli_connect("127.0.0.1:3307","maxantonini","walterowl123","raiderrater") // XAMPP
	$dbc = mysqli_connect("localhost","mantonini22webuser","reegmeems","raiderrater") // Regis
		or die("Error: Cannot connect to database server");

?>

<?php

$page_content = file_get_contents("pages/content.php");
$page_content = str_replace("!!HEADER!!", file_get_contents("/atcs/raiderrater/header.php"),$page_content);
$page_content = str_replace("!!LEFT_COLUMN!!", file_get_contents("/atcs/raiderrater/leftColumn.php"),$page_content);
$page_content = str_replace("!!FEED!!", file_get_contents("/atcs/raiderrater/feed.php"),$page_content);
$page_content = str_replace("!!FOOTER!!", file_get_contents("/atcs/raiderrater/footer.php"),$page_content);

if(isset($_SESSION["firstName"])) {
	echo "Welcome " . $_SESSION["firstName"];
	}
else {
	echo "Welcome " . "_____";
	}

echo $page_content;

// should move these outputs into User Profile box?
$sql = "SELECT * FROM rr_users";
	$rs = mysqli_query($dbc, $sql);
	while ($row = mysqli_fetch_array($rs) ) {
		echo "<br>" . $row['userID'] . "<br>";
		echo $row['userName'] . "<br>";
		echo $row['userEmail'] . "<br>";
		echo $row['firstName'] . "<br>";
		echo $row['lastName'] . "<br>";
	}

?>


</body>
</html>
