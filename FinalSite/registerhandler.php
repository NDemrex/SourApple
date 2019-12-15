<html>
<body>

	<h2>
		<a> Act 5 Application, List of blogs</a>
	</h2>
	<img
		src="https://cdn.discordapp.com/attachments/631158260317028374/636365279261360139/Logo.png"
		alt="logo" width=250 height=100>
	<hr>
	<ul>
		<li style="display: inline;"><a href="blogPost.html">Create a post</a>
		</li>
		<li style="display: inline;"><a href="makeBlogRequest.php">List Blogs</a>
		
		<li style="display: inline;"><a href="index.html">Log off</a></li>
	</ul>
	<hr>
	<table>
	</table>
	</body>
	</html>

<?php
/*
 * Nate Kelley
 * Date: 10/17/19
 * This is my page handler for my HTML form,
 * this page should display the variables submitted into the database.
 */
require_once ('myfuncs.php');
// Global Variables
define('EMPTY_STRING', "");

// databases info
$dbName = "activity2";
$tablename = "members";

// //failed attempt.
if (! isset($_POST['submit'])) { // if not set<--
    die("Post Failed no data");
} // we have good data, "trim" removes white space
else {
    // $firstName = $_POST['firsName'];
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);
}
// Let's connect to our database, we are issuing DBconnect as the datatbase.
$dbConnect = connect($dbName);

// Condition to test for success of data, displays a successful connection.
if ($dbConnect) {
    echo "<p>" . $firstName . " " . $lastName . " " . $username . " " . $password . " " . $email . "</p>";

    // validate the data input
    if ($firstName === NULL || $firstName === EMPTY_STRING || $lastName === NULL || $lastName === EMPTY_STRING) {
        echo "<p> areas marked with an astics* are <b><em>required fields</em></b> and cannot be blank </p>";
    } else {
        // the values are entering the table name, and entered into the last and first name areas.
        $sql = "INSERT INTO $tablename (firstName, lastName, username, password, email)
        VALUES('$firstName','$lastName','$username','$password','$email')";
    }

    // this will be our result
    if ($result = $dbConnect->query($sql)) {

        echo "<p> You are now registered </p>";
    } else {
        echo "<p> Error" . $dbConnect->error();
    }
    $dbConnect->close();
}
?>