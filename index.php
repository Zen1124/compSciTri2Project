<?php

	session_start();
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RaiderRater</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<style>	
		.sidenav {
			width: 140px;
			position: fixed;
			z-index: 1;
			top: 20px;
			left: 10px;
			background: #eee;
			overflow-x: hidden;
			padding: 8px 0;
		}

		.sidenav a {
			padding: 6px 8px 6px 16px;
			text-decoration: none;
			font-size: 15px;
			color: #2196F3;
			display: block;
		}

		.sidenav img {
			padding: 6px 8px;
		}

		.sidenav p {
			padding: 6px 4px 2px 16px;
			text-decoration: none;
			display: block;
			color: black;
			width: 100%;
		}

		.welcome {
			padding: 6px 8px 6px 6px;
			text-decoration: none;
			display: block;
			color: black;
			width: 100%;
		}

		.sidenav a:hover {
			color: #064579;
		}
		
		.container { 
			margin-left: 160px; /* Same width as the sidebar + left position in px */
			padding: 0px 10px;
		} 
		/* ^From w3 schools: https://www.w3schools.com/howto/howto_css_fixed_sidebar.asp */

		* {box-sizing: border-box;}

		body {
			margin: 0;
			font-family: Arial, Helvetica, sans-serif;
		}

		.topnav a {
			float: left;
			display: block;
			color: black;
			text-align: left;
			padding: 14px 16px;
			text-decoration: none;
			font-size: 17px;
		}

		.topnav input[type=text] {
			float: left;
			padding: 6px;
			margin-top: 8px;
			margin-right: 16px;
			border: none;
			font-size: 17px;
		}

		.topnav input[type=text] {
			border: 1px solid #ccc;  
		}
	</style>
</head>

<body style="background-color:#afaeee;">
<div class="container">
	<?php

		#Connect to database server
		//$dbc = mysqli_connect("127.0.0.1:3307","maxantonini","walterowl123","raiderrater") // XAMPP
		$dbc = mysqli_connect("localhost","mantonini22webuser","reegmeems","raiderrater") // Regis
			or die("Error: Cannot connect to database server");

	?>
	<br>
	
	<table width="95%" border="0" cellspacing="0" cellpadding="0">
			<tr> <!--HEADER-->
				<td colspan="3"><center>
				<div class="header"><h1> Welcome To The Raider Rater</h1></div>
					<p><a href="userSession.php">Set your username</a></p>
					<style>

</style>	
<div class="topnav" style='text-align:left'>
	<form action="wildcardSearch.php" method="post">
		<input name="searchString" size = "20" placeholder="Search.."> 
	</form>
</div>

					<!-- Should have search bar and header links on the same line -->
					<h4> <a href="explore.php">Explore</a> |
					<a href="create.php">Create</a> |
					<a href="support.php">Support</a> |
					<br>

					Find something new! </h4>
				</td>
			</tr>
		</center>
		</td>
	</tr>
		
		<div class="sidenav">
			<?php 
				if(isset($_SESSION["firstName"])) {
					echo '<p class="welcome">Welcome ' . $_SESSION["firstName"]. "</p>";
					}
				else {
					echo '<p class="welcome">Welcome ' . "_____". "</p>";
				}
			?>
			<a href="index.php"><img src="images/logo.png" alt = "Raider Rater" width = "100" height = "100"></a>
			<a href="communities.php">Communities</a>
			<p> Sort By ↓ <br></p>
			<a href=""><b> New <br></a> <!-- Filters to sort posts on main page -->
			<a href="">Funny <br> </a>
			<a href="">Popular <br></a>
			<a href="">Random <br> </b></a>
		</div>
	
		<td colspan="3"><center>
			<h2> Feed </h2>
			<div style='text-align:left'>
				<!-- Should have border around whole post, including image and comments -->
				<p style="border:3px; border-style:solid; border-color:#FF0000; padding: 1em;">
				<a href=" ">User Profile</a>
				</p>
				<br>

				<i>(Email Code embedded for comments and upvotes) </i> <br>
				<a href=" ">Comments</a>
				<br>

				<!-- <img src="/raiderrater/images/daBaby.png" alt = "daBaby" width = "200" height = "300"> -->
				<?php

				#Where all the user posts are displayed
					$sql = "SELECT * FROM rr_posts";
					$rs = mysqli_query($dbc, $sql) or die(mysqli_error($dbc));
					while ($row = mysqli_fetch_array($rs) ) {
						echo '<div class="card" style="width: 100%; height: 400px;">';
						echo '<h3 class="card-header">'. $row['postTitle']. '</h2>';
						//Location & Type
						$locationID = $row['locationID'];
						$rr_locations = mysqli_query($dbc, "SELECT * FROM rr_locations
													WHERE locationID = $locationID ");
						while ($loc = mysqli_fetch_array($rr_locations) ) { 
							echo '<h6 class="location" style="padding-left: 10px;">'. $loc['locationName']. ' | '. $loc['locationTypeID']. '</h6>';
							
						}	
						//Picture
						$picID = $row['pictureID'];
						$rr_pics = mysqli_query($dbc, "SELECT * FROM rr_pics
													WHERE pictureID = $picID ");
						while ($pic = mysqli_fetch_array($rr_pics) ) { 
							echo '<img src="'. 'images/'.$pic['fileName']. '"class="card-img-top" style="max-height: 10rem; object-fit: contain;"/>';
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
						echo '			<span style="display: inline;"> <div class="upvote" style="display: inline;">Upvotes: </div>'. $row['upvoteCount']. ' | '. '<div class="downvote" style="display: inline;">Downvotes: </div>'. $row['downvoteCount'].  '<br></span>';
						echo '		</div>';
						echo '	</div>';
						echo '</div>';
					}
				?>
			</div>
			</center>
		</td>
	</tr>
	<tr>
	<td class="column" colspan="3"><center>
		<div class="footer">
			<center>
			<br>
			<br>
			<a href="contact.php">Contact Us:</a>
			<br>
			<a href="http://www.regis.org">This project is sponsored by Regis High School</a>
		</center>
		</div>
	</center>
	</td>
	</tr>
	</table>
</body>
</html>

<?php

// $page_content = file_get_contents("pages/content.php");
// $page_content = str_replace("!!HEADER!!", file_get_contents("/atcs/raiderrater/header.php"),$page_content);
// $page_content = str_replace("!!LEFT_COLUMN!!", file_get_contents("/atcs/raiderrater/leftColumn.php"),$page_content);
// //$page_content = str_replace("!!FEED!!", file_get_contents("/atcs/raiderrater/feed.php"),$page_content);
// $page_content = str_replace("!!FOOTER!!", file_get_contents("/atcs/raiderrater/footer.php"),$page_content);

//echo $page_content;

// should move these outputs into User Profile box?
/*
$sql = "SELECT * FROM rr_users";
	$rs = mysqli_query($dbc, $sql);
	while ($row = mysqli_fetch_array($rs) ) {
		echo "<br>" . $row['userID'] . "<br>";
		echo $row['userName'] . "<br>";
		echo $row['userEmail'] . "<br>";
		echo $row['firstName'] . "<br>";
		echo $row['lastName'] . "<br>";
	}
*/
?>
</div>
</body>
</html>
