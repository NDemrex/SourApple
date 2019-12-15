<?php
require_once ('myfuncs.php');
?>

<html>


<head>

<title>Who am I</title>
</head>

<body>

	<h2>   Greetings Earthing my user ID is: <?php echo ""  . getUserID() ?> </h2>
	<p>I hope you are enjoying the blog site! The page does not naviagte to anything special, this is simply to check the login is correct. </p>

</body>
<hr>
	
	<ul>
	
	<li style="display: inline;"><a href="blogpost.html">Blog it</a></li>
	
	<li style="display: inline;"><a href="makeBlogRequest.php">View all blogs</a></li>
	
	<li style="display: inline;"><a href="searchBlogs.html">Search blogs</a></li>
		
	<li style="display: inline;"><a href="index.html">Log off</a></li>
	</ul>
	<hr>
</html>