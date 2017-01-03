<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type"  content="text/html;charset=utf-8" />
</head>
<body>
<?php
//logged admin
$path=$_SERVER["SCRIPT_FILENAME"];
$path=dirname($path);

require($path."./connection.php");
//require("functionsAdmin.php");

include("./paths/fullpath.php");

//full_path pernei tin synartisi full path kai tin ekxorei stin metabliti fullpath.
$fullpath=full_path();
session_start();


//-----------------------------------------------------
//Post for take all value from field in form
$room_type=mysql_real_escape_string($_POST['room_type']);
$view=$_POST["view"];
$square_Meters=$_POST["square_Meters"];
$floor=mysql_real_escape_string($_POST["floor"]);
$tv=mysql_real_escape_string($_POST["tv"]);
$internet=mysql_real_escape_string($_POST["internet"]);
$phone=mysql_real_escape_string($_POST["phone"]);
$mini_bar=mysql_real_escape_string($_POST["mini_bar"]);
$fridge=mysql_real_escape_string($_POST["fridge"]);
$aircondition=mysql_real_escape_string($_POST["aircondition"]);



//-----------------------------------------------------

//-----------------------------------------------------

// $echoWrongField ena string gia na mporw na eleksw ola ta paidia mesou autou tou string

$echoWrongField = "Wrong,";
//check room_type
if(!isset($room_type) || trim($room_type) == '' || ctype_digit($room_type) || $room_type < 0  )
{
	$echoWrongField = $echoWrongField . "<b> room_type	</b>";
	
}

//-----------------------------------------------------
//check square_meters field
if(!isset($square_Meters) || trim($square_Meters) == '' || !ctype_digit($square_Meters) || $square_Meters < 0  || $square_Meters >80 )
{
	$echoWrongField = $echoWrongField . " square_meters ";
	
}

//-----------------------------------------------------

//check tv field
if(!isset($tv) || trim($tv) == '' || ctype_digit($tv) ||  $tv < 0 ||  $tv > 3)
{
	$echoWrongField = $echoWrongField . " tv ";
	
}
//-----------------------------------------------------
//check internet field
if(!isset($internet) || trim($internet) == '' || ctype_digit($internet)  ||  $internet < 0 ||  $internet > 3 )
{
	$echoWrongField = $echoWrongField . " internet ";
	
}

//-----------------------------------------------------
//check view field
if(!isset($view) || trim($view) == '' || ctype_digit($view))
{
	$echoWrongField = $echoWrongField . " view	 ";
	
}

//-----------------------------------------------------
//check phone field
if(!isset($phone) || trim($phone) == '' || ctype_digit($phone) || $phone < 0 ||  $phone > 3)
{
	$echoWrongField = $echoWrongField . " phone ";
	
}

//-----------------------------------------------------
//check mini_bar field
if(!isset($mini_bar) || trim($mini_bar) == '' || ctype_digit($mini_bar) || $mini_bar < 0 ||  $mini_bar > 3 )
{
	$echoWrongField = $echoWrongField . " mini_bar ";
	
}

//-----------------------------------------------------
//check fridge field
if(!isset($fridge) || trim($fridge) == '' || ctype_digit($fridge) || $fridge < 0 ||  $fridge > 3 )
{
	$echoWrongField = $echoWrongField . " fridge ";
	
}

//-----------------------------------------------------
//check aircondition field
if(!isset($aircondition) || trim($aircondition) == '' || ctype_digit($aircondition) || $aircondition < 0 ||  $aircondition > 3 )
{
	$echoWrongField = $echoWrongField . "  aircondition ";
	
}

//-----------------------------------------------------
//check floor field
if(!isset($floor) || trim($floor) == '' || !ctype_digit($floor) || $floor < 0 && $floor > 5 )
{
	$echoWrongField = $echoWrongField . " floor ";
	
}




if($echoWrongField == "Wrong,")
{

$id=$_SESSION['room_id'];
 $query_update=mysql_query("UPDATE `room_type` SET room_type='".$room_type."', view='".$view."' , square_Meters='".$square_Meters."' , floor='".$floor."' ,  tv='".$tv."' ,  internet='".$internet."' , phone='".$phone."' , mini_bar='".$mini_bar."' , fridge='".$fridge."' , aircondition='".$aircondition."' WHERE `room_type_id`=".$id);
	if($query_update)
	{
	echo "success update room ";
	require($fullpath."/login/loggedAdmin.php");
	}
	else
	{
	echo "<br>". mysql_error();
	}
}
else 
{
	echo $echoWrongField;
}
?>


?>