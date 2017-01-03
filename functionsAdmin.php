<?php

require("connection.php");

function showAllRoomPrices()
{
		$array = array();
		$query = mysql_query("SELECT * FROM `room_price` ");
	
		return $query;

		
}
//fixxxxxxxxxxxxxxxxxxxxxxxxxx
function getRoomPriceData($room_type)
{
	$id = 0;
	if($room_type == 'sgl') 
	{
	$id = 1;
	}
	elseif($room_type == 'twin')
	{
	$id=2;
	}
	elseif($room_type == 'dbl')
	{
	$id=3;
	}
	elseif($room_type == 'triple')
	{	
	$id=4;
	}
	elseif($room_type == 'quadraple')
	{
	$id=5;
	}
	else 
	{
	$id=6;
	}

	$array = array();
	$query = mysql_query("SELECT * FROM `room_price` WHERE `price_id`=".$id);
	if($query){
	while($row = mysql_fetch_assoc($query))
					{
						$array['price_id'] = $row['price_id'];
						$array['room_type'] = $row['room_type'];
						$array['January'] = $row['January'];
						$array['February'] = $row['February'];
						$array['March'] = $row['March'];
						$array['April'] = $row['April'];
						$array['May'] = $row['May'];
						$array['June'] = $row['June'];
						$array['July'] = $row['July'];
						$array['August'] = $row['August'];
						$array['September'] = $row['September'];
						$array['October'] = $row['October'];
						$array['November'] = $row['November'];
						$array['December'] = $row['December'];
					}
	}
	else
	{
	echo "<br>". mysql_error();
	}
	return $array;
}


?>