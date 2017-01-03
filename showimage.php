<?php

mysql_connect("127.0.0.1","root","123");
mysql_select_db("hotelblue");

if(isset($_GET['id']))
{
	$id = mysql_real_escape_string($_GET['id']);
	$query = mysql_query("SELECT * FROM `new_room_images` WHERE `image_id`='$id'");
	while($row = mysql_fetch_assoc($query))
	{
		$imageData = $row["image"];
	}
	header("content-type: image/jpeg");
	echo $imageData;
}
else
{
	echo "Error!";
}

?>