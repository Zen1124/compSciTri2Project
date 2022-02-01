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
    #$dbc = mysqli_connect("localhost","mantonini22webuser","","raiderrater") // Regis
       # or die("Error: Cannot connect to database server");

    #Where all the user posts are displayed
        $sql = "SELECT * FROM rr_posts";
        $rs = mysqli_query($dbc, $sql) or die(mysqli_error($dbc));
        while ($row = mysqli_fetch_array($rs) ) {
            echo '<div class="row">';
            echo '<h2>'. $row['postTitle']. '</h2>'. '<br>';
            echo $row['pictureID']. '<br>';
            echo $row['userID']. '<br>';
            echo $row['locationID']. '<br>';
            echo $row['datePosted']. '<br>';
            echo $row['upvoteCount']. '<br>';
            echo $row['downvoteCount']. '<br>';
            echo '</div>';
        }
    ?>
 </div>
</body>
</html>
