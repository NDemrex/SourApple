<?php require_once 'utility.php';?>
<!DOCTYPE html>
<html>
<head>
<title> Success </title>
</head>
<body>
	<header>
	<h2> Login was successful : <?php  echo " " . $userName . " Please select an option below "; ?>  	<br>
 		
	<ul>
	<li style="display: inline;"><a href="whoAmI.php">Who am I</a></li>	
	
	<li style="display: inline;"><a href="blogpost.html">Blog it</a></li>
	
	<li style="display: inline;"><a href="makeBlogRequest.php">View all blogs</a></li>
	
	<li style="display: inline;"><a href="searchBlogs.html">Search blogs</a></li><br>
	
	</ul>
	<a href="index.html">Main Menu</a>
	</h2>
	<hr>
	</header>
</body>
</html>