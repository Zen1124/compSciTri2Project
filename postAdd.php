<head>	
	<title>Edit Form</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<div class='container'>
<?php
	$title= $_POST['title'];
	$imageUpload = $_POST['imageUpload'];
	$locationID= $_POST['locationID'];
	$postContent = $_POST['postContent'];
	$datePosted = date('Y-m-d H:i:s');
	
	#Connect to database server
    $dbc = mysqli_connect("localhost","mantonini22webuser","reegmeems","raiderrater") // Regis
        or die("Error: Cannot connect to database server");
		
	$sql = "INSERT INTO rr_posts(postTitle, datePosted, postContent, pictureID, locationID) VALUES ( '$title', '$datePosted', '$postContent','$imageUpload', '$locationID')";	

	$rs = mysqli_query($dbc, $sql);
	
	if ($rs) {
		echo "<div class='alert alert-success' role='alert'>
				Record Successfully Inserted!
	  		</div>";
	}
	else {
		echo "<div class='alert alert-danger' role='alert'>
		Record Insertion Failed!
		</div>";	
	}
	
?>

<a class="btn btn-primary" href="index.php">Go to Home</a>
</div>
