<html>
<link rel="stylesheet" href="DisplayUsers.css">
<table>
<tr>
	<th>ID</th>
	<th>User Name</th>
	<th>First Name</th>
	<th>Last Name</th>
	<?php 
	for($index = 0; $index < count($users); $index++ ){
	    echo"<tr>";
	    echo"<td>" .$users[$index][0] ."</td>".
	    "<td>" .$users[$index][1] ."</td>".
	    "<td>" .$users[$index][2] ."</td>".
	    "<td>" .$users[$index][3] ."</td>";
	    echo"</tr>";
	    
	}
	?>
</tr>
</table>
</html>