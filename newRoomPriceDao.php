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
$January=$_POST["January"];
$February=$_POST["February"];
$March=$_POST["March"];
$April=$_POST["April"];
$May=$_POST["May"];
$June=$_POST["June"];
$July=$_POST["July"];
$August=$_POST["August"];
$September=$_POST["September"];
$October=$_POST["October"];
$November=$_POST["November"];
$December=$_POST["December"];


//-----------------------------------------------------

//-----------------------------------------------------

// $echoWrongField ena string gia na mporw na eleksw ola ta paidia mesou autou tou string

$echoWrongField = "Wrong,";

//check room_type
if(!isset($room_type) || trim($room_type) == '' || ctype_digit($room_type) || $room_type < 0  )
{
	$echoWrongField = $echoWrongField . "<b> room_type 	</b>";
	
}
//check January price
if(!isset($January) || trim($January) == '' || !ctype_digit($January) || $January < 0  )
{
	$echoWrongField = $echoWrongField . "<b> January	</b>";
	
}//check February price
if(!isset($February) || trim($February) == '' || !ctype_digit($February) || $February < 0  )
{
	$echoWrongField = $echoWrongField . "<b> February	</b>";
	
}//check March price
if(!isset($March) || trim($March) == '' || !ctype_digit($March) || $March < 0  )
{
	$echoWrongField = $echoWrongField . "<b> March 	</b>";
	
}//check April price
if(!isset($April) || trim($April) == '' || !ctype_digit($April) || $April < 0  )
{
	$echoWrongField = $echoWrongField . "<b> April	</b>";
	
}//check May price
if(!isset($May) || trim($May) == '' || !ctype_digit($May) || $May < 0  )
{
	$echoWrongField = $echoWrongField . "<b> May	</b>";
	
}//check June price
if(!isset($June) || trim($June) == '' || !ctype_digit($June) || $June < 0  )
{
	$echoWrongField = $echoWrongField . "<b> June	</b>";
	
}//check July price
if(!isset($July) || trim($July) == '' || !ctype_digit($July) || $July < 0  )
{
	$echoWrongField = $echoWrongField . "<b> July	</b>";
	
}//check August price
if(!isset($August) || trim($August) == '' || !ctype_digit($August) || $August < 0  )
{
	$echoWrongField = $echoWrongField . "<b> August	</b>";
	
}//check September price
if(!isset($September) || trim($September) == '' || !ctype_digit($September) || $September < 0  )
{
	$echoWrongField = $echoWrongField . "<b> September	</b>";
	
}//check October price
if(!isset($October) || trim($October) == '' || !ctype_digit($October) || $October < 0  )
{
	$echoWrongField = $echoWrongField . "<b> October	</b>";
	
}//check November price
if(!isset($November) || trim($November) == '' || !ctype_digit($November) || $November < 0  )
{
	$echoWrongField = $echoWrongField . "<b> November	</b>";
	
}//check December price
if(!isset($December) || trim($December) == '' || !ctype_digit($December) || $December < 0  )
{
	$echoWrongField = $echoWrongField . "<b> December	</b>";
	
}


if($echoWrongField == "Wrong,")
{
$id = 0;
	if($_SESSION['room_name'] == "sgl") 
	{
	$id = 1;
	}
	elseif($_SESSION['room_name'] == 'twin')
	{
	$id=2;
	}
	elseif($_SESSION['room_name'] == 'dbl')
	{
	$id=3;
	}
	elseif($_SESSION['room_name'] == 'triple')
	{	
	$id=4;
	}
	elseif($_SESSION['room_name'] == 'quadraple')
	{
	$id=5;
	}
	else 
	{
	$id=6;
	}
	

 $query_update=mysql_query("UPDATE `room_price` SET January='".$January."', February='".$February."' , March='".$March."' , April='".$April."' ,  May='".$May."' ,  June='".$June."' , July='".$July."' , August='".$August."' , September='".$September."' , October='$October' , November='".$November."' , December='".$December."' WHERE `price_id`=".$id);
	if($query_update)
	{
	echo "success add new price";
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

</body>
</html>