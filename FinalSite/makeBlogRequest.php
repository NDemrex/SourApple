<html>
<link rel="stylesheet" href="makeBlogRequest.css">
<body>

	<h2>
		<a>List of blogs</a>
	</h2>
	<img
		src="https://cdn.discordapp.com/attachments/631158260317028374/636365279261360139/Logo.png"
		 alt="logo" width=250 height=100><br>
		 
	<hr>
	
	<ul>
		
	<li style="display: inline;"><a href="whoAmI.php">Who am I</a></li>	
	
	<li style="display: inline;"><a href="blogpost.html">Blog it</a></li>
	
	<li style="display: inline;"><a href="searchBlogs.html">Search blogs</a></li>
		
	<li style="display: inline;"><a href="index.html">Log off</a></li>
	</ul>
	<hr>
	<table>
	<?php
require_once ('myfuncs.php');
require_once ('utility.php');
$dbName = "activity2";
$tablename = "posts";
$blogs = getAllBlogs($dbName, $tablename);

for ($index = 0; $index < count($blogs); $index++) {
    echo "<tr>";
    echo "<th>" . $blogs[$index][2] . "</th>";
    echo "<td><a href='getBlogRequest.php?PostID=" . $blogs[$index][0] . 
    "&members_ID=" . $blogs[$index][1] . 
    "&Title=" . $blogs[$index][2] . 
    "&Content=" . $blogs[$index][3] .
    "'>View</a></td>";
    echo "</tr>";
    
}
?>	
	</table>
</body>
</html>
