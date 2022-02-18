<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Project (JAM Studios)</title>
</head>
<body style="background-color:#afaeee;">
  <a href="index.php"> <img src="images/logo.png" alt = "Raider Rater" width = "100" height = "100"></a>
<br>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

<td> </td>

Selected Post: <br>

<?php
		#Connect to database server
		//$dbc = mysqli_connect("127.0.0.1:3307","maxantonini","walterowl123","raiderrater") // XAMPP
		$dbc = mysqli_connect("localhost","mantonini22webuser","reegmeems","raiderrater") // Regis
			or die("Error: Cannot connect to database server");

$var = rand(6, 11);
echo $var;
/*
	$sql = "SELECT * FROM rr_posts ORDER BY ID DESC LIMIT 1";
	$rs = mysqli_query($dbc, $sql) or die(mysqli_error($dbc));
		while ($row = mysqli_fetch_array($rs) ) {
			$maxID = $row['postID']
		}
*/
				$sql = "SELECT * FROM rr_posts WHERE postID = 7";
					$rs = mysqli_query($dbc, $sql) or die(mysqli_error($dbc));
					while ($row = mysqli_fetch_array($rs) ) {
						echo '<div class="card" style="width: 70%; height: 50%;">';
						echo '<h3 class="card-header">'. $row['postTitle']. '</h2>';
						//Location & Type
						$locationID = $row['locationID'];
						$rr_locations = mysqli_query($dbc, "SELECT DISTINCT rr_locations.locationName, rr_location_types.locationTypeName 
															FROM rr_locations
																INNER JOIN rr_location_types on rr_locations.locationTypeID = rr_location_types.locationTypeID
																	WHERE rr_locations.locationID = $locationID ");
						while ($loc = mysqli_fetch_array($rr_locations) ) { 
								echo '<h6 class="location" style="padding-left: 10px;">'. $loc['locationName']. ' | '. $loc['locationTypeName']. '</h6>';
							
						}	
						//Picture
						$picID = $row['pictureID'];
						$rr_pics = mysqli_query($dbc, "SELECT * FROM rr_pics
													WHERE pictureID = $picID ");
						while ($pic = mysqli_fetch_array($rr_pics) ) { 
							echo '<img alt="Image not found" src="'. 'images/'.$pic['fileName']. '"class="card-img-top" style="height: 10rem; object-fit: contain;"/>';
						}
						echo '	<div class="card-body">';
						echo '		<p>'. $row['postContent']. '</p>';
						echo '		<div style="font-size: 11px;">';
						//Username
						$userID = $row['userID'];
						$rr_users = mysqli_query($dbc, "SELECT * FROM rr_users
													WHERE userID = $userID ");
						while ($usr = mysqli_fetch_array($rr_users) ) { 
							echo '<p id="username">'. $usr['userName']. '</p>';
						}
						echo '			<p id="datePosted">'. $row['datePosted']. '<br> </p>';
						echo '			<span style="display: inline;"> <div class="upvote" style="display: inline;">
						<span class="material-icons" style="font-size:24px;color:green;"> thumb_up </span> </div>'. $row['upvoteCount']. ' | '. '<div class="downvote" style="display: inline;">
						<span class="material-icons" style="font-size:24px;color:red;"> thumb_down </span> </div>'. $row['downvoteCount'].  '<br></span>';
						echo '		</div>';
						echo '	</div>';
						echo '</div>';
					}
/* Compiles a random group of posts from all
communities for the user to choose from
*/
?>
</body>
</html>
