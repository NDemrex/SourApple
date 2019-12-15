<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', '1');

require_once ('myfuncs.php');
require_once ('utility.php');
$dbName = "activity2";
$tablename = "posts";
$user = $_GET["user"];
$PostID = $_GET["PostID"];
deleteBlog($dbName, $tablename, $PostID)
?>
<html>
<body>

	<h1>
		<a>Deleted Post <?php echo $user ?></a>
	</h1>
	<img
		src="https://cdn.discordapp.com/attachments/631158260317028374/636365279261360139/Logo.png"
		alt="logo" width=250 height=100>
	<hr>
	<ul>
		<li style="display: inline;"><a href="blogPost.html">Create a post</a>
		</li>

		<li style="display: inline;"><a href="makeBlogRequest.php">List Blogs</a>
		</li>

		<li style="display: inline;"><a href="index.html">Log off</a></li>
		
	</ul>
	
		<p> Your Post has been removed! </p>
	<hr>
	<table>
	</table>
</body>
</html>
