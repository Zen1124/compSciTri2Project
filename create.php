<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="background-color:#afaeee;">
  <a href="index.php"> <img src="images/logo.png" alt = "Raider Rater" width = "100" height = "100"></a>
<br>
    <?php

    #Connect to database server
    $dbc = mysqli_connect("localhost","mantonini22webuser","reegmeems","raiderrater") // Regis
        or die("Error: Cannot connect to database server");

    ?>
    Title <br>
    (Upload file and image code) <br>
    Rating <br>
    <div class="container">
		<h1>Make a post!</h1>
		<form action="postAdd.php" method="post">
			<div class="form-group">
				<div class="row">
					<div class="col">
						Title: <input class="form-control"name="title" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col">
						Image Upload <input class="form-control" name="imageUpload"> <!--Add later-->
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-2">
						<label for="locationSelect">Location:</label>
						<select name="locationID" id="locationSelect" class="form-control form-control-md" required>
						<?php
							// select the data needed to display the drop-down menu for advisement groups
							$sql = "SELECT * FROM rr_locations";

							$rs = mysqli_query($dbc, $sql);

							while ($row = mysqli_fetch_array($rs)) {
								$rrLocationID = $row["locationID"];
								$rrLocationName = $row["locationName"];

								// echo an option value into the select field
								echo "<option value = '$rrLocationID'>$rrLocationName</option>";
							}
						?>
						</select>
					</div>
				</div>
			</div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
						Post Content: <input class="form-control"name="postContent" required>
					</div>
                </div>
            </div>
			<input type="submit" value="Add Post" name="addPost">
		</form>
		<a class="btn btn-primary" href="index.php" role="button">Back</a>

</body>
</html>
