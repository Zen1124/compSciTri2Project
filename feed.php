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

<h2> Feed </h2>
<div style='text-align:left'>
    <!-- Should have border around whole post, including image and comments -->
    <p style="border:3px; border-style:solid; border-color:#FF0000; padding: 1em;">
    <a href=" ">User Profile</a>
    </p>
    <img src="/raiderrater/images/mickey.png" alt = "Mickey Mouse" width = "200" height = "300">

    <br>

    <i>(Email Code embedded for comments and upvotes) </i> <br>
    <a href=" ">Comments</a>
    <br>

    <!-- <img src="/raiderrater/images/daBaby.png" alt = "daBaby" width = "200" height = "300"> -->
    <?php
    #Connect to database server
    $dbc = mysqli_connect("localhost","mantonini22webuser","reegmeems","raiderrater") // Regis
        or die("Error: Cannot connect to database server");

    #Where all the user posts are displayed
        $sql = "SELECT * FROM rr_posts";
        $rs = mysqli_query($dbc, $sql);
        while ($row = mysqli_fetch_array($rs) ) {
            echo '<div class="row">';
            echo "<h2>" . $row['postTitle'] . "</h2>";
            echo $row['imageID'] . "<br>";
            echo $row['userID'] . "<br>";
            echo $row['locationID'] . "<br>";
            echo $row['datePosted'] . "<br>";
            echo $row['upvoteCount'] . "<br>";
            echo $row['downvoteCount'] . "<br>";
            echo "</div>";
        }
    ?>
 </div>
</body>
</html>
