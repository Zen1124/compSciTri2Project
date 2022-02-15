<html>
	<head>
		<title>Wildcard Search Demonstration</title>
	</head>

	<body style="background-color:#afaeee;">
		<h2>Wildcard Search</h2>
	
		
	</body>
</html>

<a href="index.php"><img src="images/logo.png" alt = "Raider Rater" width = "100" height = "100"></a>

<?php

$searchString = ($_POST['searchString']);

	if (isset($_POST['searchString'])) 
	{
		//$dbc = mysqli_connect("127.0.0.1:3307","maxantonini","walterowl123","raiderrater"); // XAMPP
		$dbc = mysqli_connect("localhost","mantonini22webuser","reegmeems","raiderrater") // Regis !!
			or die("Error: Cannot connect to database server");
		// SEARCH BY CUSTOMER
		
		$sql = "
		SELECT * FROM rr_posts
		WHERE 
		postTitle like '%$searchString%'
		or postContent like '%$searchString%'

		";
		
		$rs = mysqli_query($dbc, $sql);
		
		echo "<h2>Search Results for $searchString</h2>";
		
		$row_cnt = mysqli_num_rows($rs);
		
		echo "<h3> Posts ($row_cnt)</h3>";;
		echo "<u1>";
		while ($row = mysqli_fetch_array($rs) ) {
			$postTitle = $row['postTitle'];
			$postContent = $row['postContent'];
			
		echo "<li> $postTitle | $postContent ";
		}
	}

?>