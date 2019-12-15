
<html>
<hr>
<ul>
	<li style="display: inline;"><a href="blogPost.html">Create a post</a>
	</li>
	<li style="display: inline;"><a href="makeBlogRequest.php">List Blogs</a>
	
	<li style="display: inline;"><a href="index.html">Log off</a></li>
</ul>
<hr> 
<?php
/*
 * Nate Kelley
 * Date: 11/16/19
 */

// Global Variables, keep these the same.
define('EMPTY_STRING', "");

require_once ('myfuncs.php');

// databases info
$dbName = "activity2";
$tablename = "posts";

// //failed attempt.
if (! isset($_POST['Post'])) { // if not set<-- submit?
    echo die("Post Failed no data");
} // we have good data, "trim" removes white space
else {
    $members_ID = getUserID();
    $title = trim($_POST['Title']);
    $content = trim($_POST['Content']);
}
// Let's connect to our database, we are issuing DBconnect as the datatbase.
$dbConnect = connect($dbName);

// Condition to test for success of data, displays a successful connection.
if ($dbConnect) {
    echo " <p> <br> ID: " . $members_ID . "<br> Title: " . $title . " <br> Content: " . $content . "</p>";

    // validate the data input
    if ($title === NULL || $title === EMPTY_STRING || $content === NULL || $content === EMPTY_STRING) {
        echo "<p>  areas marked with an astics* are <b><em>required fields</em></b> and cannot be blank </p>";
    } else { // was members_ID
        $sql = "INSERT INTO $tablename (members_ID,Title,Content)   
        VALUES('$members_ID','$title','$content')"; // the values are entering the table name. they need to match

        // this will be our result
        if ($result = $dbConnect->query($sql)) {

            echo "<p> You made a post! </p>";
        } else {
            echo "<p> Error" . $dbConnect->error . "</p>";
        }
    }
    $dbConnect->close();
}
?>
</html>