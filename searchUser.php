<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Search (with keywords) Tutorial</title>
</head>

<body>
<?php

require("./connection.php");

$search = mysql_real_escape_string(trim($_POST['searchterm']));
echo "LOLOLOL";

$find_room = mysql_query("SELECT * FROM `room_type` WHERE `room_type` LIKE '%$search%'");
while($row = mysql_fetch_assoc($find_room))
{
			
			echo "<tr> ";
			// $row is array... foreach( .. ) puts every element
			// of $row to $cell variable
			foreach($row as $cell)
				echo "<td>  $cell </td> ";

			echo "</tr>";
			
			 }
					

?>
</body>
</html>