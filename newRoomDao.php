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

//-----------------------------------------------------
//Post for take all value from field in form
$room_type=mysql_real_escape_string($_POST['room_type']);
$square_meters=$_POST["square_meters"];
$view=$_POST["view"];
$floor=mysql_real_escape_string($_POST['floor']);
$tv=mysql_real_escape_string($_POST['tv']);
$internet=mysql_real_escape_string($_POST['internet']);
$phone=mysql_real_escape_string($_POST['phone']);
$mini_bar=mysql_real_escape_string($_POST['mini_bar']);
$fridge=mysql_real_escape_string($_POST['fridge']);
$aircondition=mysql_real_escape_string($_POST['aircondition']);


//-----------------------------------------------------

// $echoWrongField ena string gia na mporw na eleksw ola ta paidia mesou autou tou string

$echoWrongField = "Wrong,";

/*
-----------------------------------------------------
TODO: Na kanw synartisis gia autin tin douleia ,otan problabw 
TODO: CSS gia ta pedia na fenontai wraia ( douleia : maria)
check for all fields
-----------------------------------------------------
*/

//check room_type
if(!isset($room_type) || trim($room_type) == '' || ctype_digit($room_type) || $room_type < 0  )
{
	$echoWrongField = $echoWrongField . "<b> room_type	</b>";
	
}

//-----------------------------------------------------
//check square_meters field
if(!isset($square_meters) || trim($square_meters) == '' || !ctype_digit($square_meters) || $square_meters < 0  || $square_meters >80 )
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
if(!isset($view) || trim($view) == '' || ctype_digit($view)  )
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
//-----------------------------------------------------
//check file
$echoWrongImage = "Wrong,";
$allowedExts = array("gif", "jpeg", "jpg", "png");
//The explode() function breaks a string into an array.
$temp = explode(".", $_FILES["image"]["name"]);
$extension = end($temp);
if ((($_FILES["image"]["type"] == "image/gif")
|| ($_FILES["image"]["type"] == "image/jpeg")
|| ($_FILES["image"]["type"] == "image/jpg")
|| ($_FILES["image"]["type"] == "image/pjpeg")
|| ($_FILES["image"]["type"] == "image/x-png")
|| ($_FILES["image"]["type"] == "image/png"))
//&& ($_FILES["file"]["size"] < 200000) check gia to size ti paizei..
&& in_array($extension, $allowedExts))
  {
			if ($_FILES["image"]["error"] > 0)
			{
			$echoWrongImage = "Wrong," . $_FILES["image"]["error"] . "<br>";
			}
			elseif(!isset($_FILES['image']['tmp_name']))
			{
            $echoWrongImage = $echoWrongImage . 'Please select an Image';

			}
			else 
			{
				$image_check=getimagesize($_FILES['image']['tmp_name']);

						if($image_check==false)
						{
						$echoWrongImage = $echoWrongImage . 'Not a Valid Image';
						}
						

             }
		  
  }
else
  {
  
  $echoWrongImage = "Wrong, invalid file";
  }
//-----------------------------------------------------
//


// ean to $echoWrongField einai akoma iso me Wrong simainei oti ola ta paidia einai ok ara mporei na ginei i kataxwrisei tou room
if($echoWrongField == "Wrong," && $echoWrongImage = "Wrong,")
{
mysql_query("INSERT INTO room_type (hotel_id,image_id,room_type,view,floor,square_meters, tv, internet, phone, mini_bar, fridge, aircondition)
VALUES (0,NULL,'".$room_type."','".$view."','".$floor."','".$square_meters."','".$tv."','".$internet."','".$phone."','".$mini_bar."','".$fridge."','".$aircondition."')");


require("./newRoomForm.php");

echo "Success " . "<br>";




		//check an epilexthike ontws h eikona gia na grapsei ta stoixeia tis eikonas!! Alliws emfanizei antistoixo message
		if(!$_FILES["image"]["name"]=='')
		{
								/*
								 escape the values to prevent SQL injection, and also to deal with the fact that $image contains binary data.
								Second,we quote $image in the SQL.
								*/
								$imageData =mysql_real_escape_string(file_get_contents ($_FILES['image']['tmp_name']    ));
								$image_name=mysql_real_escape_string($_FILES['image']['name']);            
								$imageType =mysql_real_escape_string($_FILES["image"]["type"]);	
								//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
								$image_query=mysql_query("INSERT INTO new_room_images (image_id,image_name,image) VALUES (0,'".$image_name."','".$imageData."')");
								
								//image id for update
								$image_id=mysql_query("SELECT * FROM new_room_images WHERE  image_name = '".$image_name."' AND image = '".$imageData."'");								
								$record_image = mysql_fetch_array($image_id);
								echo $record_image['image_id'];
									
								//room id for update
							
								$room_id=mysql_query("SELECT * FROM room_type WHERE room_type = '".$room_type."' AND square_meters = '".$square_meters."'  AND tv = '".$tv."'  AND internet = '".$internet."' AND view = '".$view."' AND phone = '".$phone."'  AND mini_bar = '".$mini_bar."' AND fridge = '".$fridge."' AND aircondition = '".$aircondition."'  AND floor = '".$floor."'" );
								
								$record_room = mysql_fetch_array($room_id);
							  
								
									
								if($room_id && $image_id ){
								$update_room_type= mysql_query("UPDATE room_type SET image_id='".$record_image['image_id']."'  WHERE room_type_id = '".$record_room['room_type_id']."' ");
								}
								else{
								echo "<br>". mysql_error();
								}
								
								
						
					
								
								
								//TODO NA BAZW STO ROOM_TYPE TO ID APO TIN EIKONA POU ANTISTOIXEI
								//if($image_query && $update_room_type)
								if($image_query)
								{
												echo "success insert image!!! ";
												echo "Upload: " . $_FILES["image"]["name"] . "<br>";
												echo "Type: " .$imageType . "<br>";
												echo "Size: " . ($_FILES["image"]["size"] / 1024) . " kB<br>";
												echo "Stored in: " . $_FILES["image"]["tmp_name"];
								
							 //--------------------------------- upload foto------------------------------------------------------
							    $id = mysql_real_escape_string($record_image['image_id']);
								echo $id;
								echo '<img src="showimage.php?id='.$id.'">' ;
											
								}
								else
								{
								echo "<br>". mysql_error();
								//$echoWrongImage = $echoWrongImage . 'sql wrong';
								}
		}
			
								
 }
			
//-------------------------------------------------------------------------------------------------------------------------
//allios ean exei allaksei to $echoWrongField tote kalo tin forma kai efanizw to string allagmeno ws pros ta problimata tou
else{
require("./newRoomForm.php");
echo 'FIELDS: '.$echoWrongField .'<br />';
echo 'IMAGE: '.$echoWrongImage;
}

									
                   



?>

</body>
</html>
