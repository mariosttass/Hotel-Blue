<?php

require("connection.php");

function getUsersData($id)
{
	$array = array();
	$q = mysql_query("SELECT * FROM `users` WHERE `id`=".$id);
	while($r = mysql_fetch_assoc($q))
	{
		$array['id'] = $r['id'];
		$array['username'] = $r['username'];
		$array['password'] = $r['password'];
		$array['firstname'] = $r['firstname'];
		$array['lastname'] = $r['lastname'];
		$array['profileext'] = $r['profileext'];
		$array['aboutme'] = $r['aboutme'];
		$array['birthday'] = $r['birthday'];
		$array['country'] = $r['country'];
		$array['city'] = $r['city'];
	}
	return $array;
}

function getId($username)
{
	$q = mysql_query("SELECT `id` FROM `users` WHERE `username`='".$username."'");
	while($r = mysql_fetch_assoc($q))
	{
		return $r['id'];
	}
}

function userExists($id)
{
	$numrows = mysql_num_rows(mysql_query("SELECT `id` FROM `users` WHERE `id`=".$id));
	if($numrows==1)
		return true;
	else
		return false;
}

function updateFirstLastName($id,$firstName,$lastName)
{
	if(mysql_query("UPDATE `users` SET `firstname`='".$firstName."', `lastname`='".$lastName."' WHERE `id`=".$id))
		return true;
	else
		return false;
}

function updateAboutMe($id,$aboutMe)
{
	if(mysql_query("UPDATE `users` SET `aboutme`='".$aboutMe."' WHERE `id`=".$id))
		return true;
	else
		return false;
}

function updateCountryCity($id,$country,$city)
{
	if(mysql_query("UPDATE `users` SET `country`='".$country."', `city`='".$city."' WHERE `id`=".$id))
		return true;
	else
		return false;
}

function updateBirthday($id,$birthday)
{
	if(mysql_query("UPDATE `users` SET `birthday`=".$birthday." WHERE `id`=".$id))
		return true;
	else
		return false;
}

function updateProfilePicture($id,$ext)
{
	if(mysql_query("UPDATE `users` SET `profileext`='".$ext."' WHERE `id`=".$id))
		return true;
	else
		return false;
}

function resetProfilePicture($id,$ext)
{
	if(mysql_query("UPDATE `users` SET `profileext`='n/a' WHERE `id`=".$id))
		return true;
	else
		return false;
}

function showAllRoom()
{
		$array = array();
		$query = mysql_query("SELECT * FROM `room_type` ");
	
		return $query;

		
}
function showRoomData($id)
{
$array = array();
		$query = mysql_query("SELECT * FROM `room_type` WHERE `room_type_id`='".$id);
			return $query;
}

function getRoomData($id)
{
	$array = array();
	$query = mysql_query("SELECT * FROM `room_type` WHERE `room_type_id`=".$id);
	while($row = mysql_fetch_assoc($query))
					{
						$array['room_type_id'] = $row['room_type_id'];
						$array['hotel_id'] = $row['hotel_id'];
						$array['image_id'] = $row['image_id'];
						$array['room_type'] = $row['room_type'];
						$array['view'] = $row['view'];
						$array['floor'] = $row['floor'];
						$array['square_Meters'] = $row['square_Meters'];
						$array['tv'] = $row['tv'];
						$array['internet'] = $row['internet'];
						$array['phone'] = $row['phone'];
						$array['mini_bar'] = $row['mini_bar'];
						$array['fridge'] = $row['fridge'];
						$array['aircondition'] = $row['aircondition'];
					}
	return $array;
}


//update room name
function updateRoomName($id,$roomName)
{

	if(mysql_query("UPDATE `room_type` SET `room_type`='".$roomName."' WHERE `room_type_id`=".$id))
		return true;
	else
		return false;
}
// update updateViewName
function updateViewName($id,$view)
{

	if(mysql_query("UPDATE `room_type` SET `view`='".$view."' WHERE `room_type_id`=".$id))
		return true;
	else
		return false;
}

//update floor

function updateFloor($id,$floor)
{

	if(mysql_query("UPDATE `room_type` SET `floor`='".$floor."' WHERE `room_type_id`=".$id))
		return true;
	else
		return false;
}
//updateSquareMeters
function updateSquareMeters($id,$square_Meters)
{

	if(mysql_query("UPDATE `room_type` SET `square_Meters`='".$square_Meters."' WHERE `room_type_id`=".$id))
		return true;
	else
		return false;
}

?>