<head>	
	<title>Edit Form</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<div class='container' style="background-color: #afaeee;">
<?php
	$target_dir = "images/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	$title= $_POST['title'];
	$imageUpload = $_FILES["fileToUpload"]["name"];;
	$locationID= $_POST['locationID'];
	$postContent = $_POST['postContent'];
	$datePosted = date('Y-m-d H:i:s');
	
	/* Image Upload  */
	
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}

	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}

	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}

	#Connect to database server
    //$dbc = mysqli_connect("127.0.0.1:3307","maxantonini","walterowl123","raiderrater") // XAMPP
	$dbc = mysqli_connect("localhost","mantonini22webuser","reegmeems","raiderrater") // Regis
		or die("Error: Cannot connect to database server");

	//Add Image to Database	
	$rs = mysqli_query($dbc, "INSERT INTO rr_pics (fileName) VALUES ('$imageUpload')") or die(mysqli_error($dbc));

	$rs = mysqli_query($dbc, "SELECT * FROM rr_pics ORDER BY pictureID DESC LIMIT 1") or die(mysqli_error($dbc));
	
	while ($row = mysqli_fetch_array($rs) ) {
		$imageUploadID = $row["pictureID"];
	}

	$sql = "INSERT INTO rr_posts (postTitle, datePosted, userID, postContent, pictureID, locationID) VALUES ( '$title', '$datePosted', '1', '$postContent','$imageUploadID', '$locationID')";	

	$rs = mysqli_query($dbc, $sql) or die(mysqli_error($dbc));
	
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
