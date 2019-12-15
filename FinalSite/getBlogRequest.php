<html>
<body>
	<h2>
		<a> Get the blogs</a>
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
<?php
require_once ('utility.php');
$dbName = "activity2";
$tablename = "members";
$postID = $_GET["PostID"];
$userID = $_GET["members_ID"];
$title = $_GET["Title"];
$Content = $_GET["Content"];
$user = getUser($dbName, $tablename, $userID);


?>

<form action="updateHandler.php" method="post">
		<input type="text" name="PostID" maxlength="11" size="11" hidden
			value="<?php echo $postID ?>">

		<p>
			<label>Author: </label> <br> <input type="text" name="Author"
				maxlength="50" size="50" value=<?php echo $user?>><br>
		</p>

		<p>
			<label>Title: </label> <br> <input type="text" name="Title"
				maxlength="50" size="50" value=<?php echo $title?>><br>
		</p>

		<p>
			<label>Content: </label><br>
			<textarea name="Content" rows="10" cols="50"><?php echo $Content?></textarea>
		<br>
		</p>
		<input type="submit" name="submit" value="Update">
		<button>
		<!-- Query string get information -->
			<a href="deletehandler.php?PostID=<?php echo $postID?>
			&user=<?php echo $user; ?>"
			style= text_decoration: "none">Delete</a>
		</button>
	</form>
</body>

</html>
