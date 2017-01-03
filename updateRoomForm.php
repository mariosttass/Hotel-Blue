<?php
//error_reporting(0);
$path=$_SERVER["SCRIPT_FILENAME"];
$path=dirname($path);
require($path."./connection.php");
session_start();
require("functionsUser.php");

//pernoume ola ta room data


if(!isset($_SESSION['room_id']))
{
$_SESSION['room_id']=$_POST['room_id'];	
}

$roomData = getRoomData($_SESSION['room_id']);





?>

<html>
<head>
<p align='center'> UPDATE FORM for a new ROOM .</p>

<style>


</style>
</head>

<body>
<?php

//emfanizw ta stoixeia tou gygkekrimenou room p epilexthike


//$roomId = trim(mysql_real_escape_string($roomData['room_type_id']));







echo "<br /><br /><br /><br /><br />";


echo "<table border=2>";
echo"
<tr>
<th>room_type_id</th>
<th>hotel_id</th>
<th>image_id</th>
<th>room_type</th>
<th>view</th>
<th>floorNumber</th>
<th>square_Meters</th>
<th>tv</th>
<th>internet</th>
<th>phone</th>
<th>mini_bar</th>
<th>fridge</th>
<th>aircondition</th>

</tr>

";
//edw emfanizoume ta stoixeia tou sygkekrimenou room mesa sto table 
//wste na mporei na blepei gia na allaksei kati..		
			echo "<tr> ";
			foreach($roomData as $cell)
				echo "<td> $cell</td> ";

			echo "</tr>";
			
			 
echo "</table>";

echo "<br /><br /><br /><br /><br />";


//pernoume ola ta dedomena gia to dwmatio
//$roomData=getRoomData($_SESSION['room_id']);


?>

 <!----------------------------------------------------------------------------------------->
 <!----------------------------------------------------------------------------------------->
 <!----------------------------------------------------------------------------------------->	
	
<form method='Post' action='./updateRoomDao.php'>
<table border='1' align='center'>
	<tr>
		<th >
		room_type:
				<select name="room_type">
				<option value='sql' <?php if($roomData['room_type']=="sql") echo "selected"; ?>>sql</option>
                <option value='twin' <?php if($roomData['room_type']=="twin") echo "selected"; ?>>twin</option>
				<option value='dbl' <?php if($roomData['room_type']=="dbl") echo "selected"; ?>>dbl</option>
				<option value='triple' <?php if($roomData['room_type']=="triple") echo "selected"; ?>>triple</option>
				<option value='quadraple' <?php if($roomData['room_type']=="quadraple") echo "selected"; ?>>quadraple</option>
				<option value='suit' <?php if($roomData['room_type']=="suit") echo "selected"; ?>>suit</option>
				</select>
				
		</th>
		
	</tr>
	
	 <!----------------------------------------------------------------------------------------->
 <!----------------------------------------------------------------------------------------->
 <!----------------------------------------------------------------------------------------->
	<tr>
		<th>
		view:<input type='text' name='view' value="<?php if(isset($_POST['view'])) echo trim(mysql_real_escape_string($_POST['view'])); else echo $roomData['view']; ?>"/>  
		</th>
	</tr>
	  <!----------------------------------------------------------------------------------------->
 <!----------------------------------------------------------------------------------------->
 <!----------------------------------------------------------------------------------------->
	<tr>
		<th>
		floor_number:
					<select name="floor" >
					<option <?php if($roomData['floor']=="1") echo "selected"; ?>>1</option>
					<option <?php if($roomData['floor']=="2") echo "selected"; ?>>2</option>
					<option <?php if($roomData['floor']=="3") echo "selected"; ?>>3</option>
					<option <?php if($roomData['floor']=="4") echo "selected"; ?>>4</option>
					<option <?php if($roomData['floor']=="5") echo "selected"; ?>>5</option>
					</select>		
		</th>
	</tr>
 <!----------------------------------------------------------------------------------------->
 <!----------------------------------------------------------------------------------------->
 <!----------------------------------------------------------------------------------------->
 
 <tr>
		<th>
		square_Meters:<input type='text' name='square_Meters' value="<?php if(isset($_POST['square_Meters'])) echo trim(mysql_real_escape_string($_POST['square_Meters'])); else echo $roomData['square_Meters']; ?>"/>  
		</th>
	</tr>
	
	 <!----------------------------------------------------------------------------------------->
 <!----------------------------------------------------------------------------------------->
 <!----------------------------------------------------------------------------------------->
	<tr>
		<th>
					tv:<select name ="tv" >
					<option <?php if($roomData['tv']=="yes") echo "selected"; ?> >yes</option>
					<option  <?php if($roomData['tv']=="no") echo "selected"; ?>>no</option>
					</select>	
		
		</th>
	</tr>
	
 <!----------------------------------------------------------------------------------------->
 <!----------------------------------------------------------------------------------------->
 <!----------------------------------------------------------------------------------------->	

	<tr>
		<th>
		
				internet:	
					<select name="internet" >
					<option <?php if($roomData['internet']=="yes") echo "selected"; ?> >yes</option>
					<option  <?php if($roomData['internet']=="no") echo "selected"; ?>>no</option>
					</select>	
		</th>
	</tr>
 <!----------------------------------------------------------------------------------------->
 <!----------------------------------------------------------------------------------------->
 <!----------------------------------------------------------------------------------------->
	<tr>
		<th>
				
				phone:	<select name="phone" >
					<option <?php if($roomData['phone']=="yes") echo "selected"; ?> >yes</option>
					<option  <?php if($roomData['phone']=="no") echo "selected"; ?>>no</option>
					</select>	
		</th>
	</tr>
 <!----------------------------------------------------------------------------------------->
 <!----------------------------------------------------------------------------------------->
 <!----------------------------------------------------------------------------------------->
	<tr>
		<th>
		
				mini_bar:	<select name="mini_bar" >
					<option <?php if($roomData['mini_bar']=="yes") echo "selected"; ?> >yes</option>
					<option  <?php if($roomData['mini_bar']=="no") echo "selected"; ?>>no</option>
					</select>	
		</th>
	</tr>
 <!----------------------------------------------------------------------------------------->
 <!----------------------------------------------------------------------------------------->
 <!----------------------------------------------------------------------------------------->
	<tr>
		<th>
				fridge:	<select name="fridge" >
							<option <?php if($roomData['fridge']=="yes") echo "selected"; ?> >yes</option>
					<option  <?php if($roomData['fridge']=="no") echo "selected"; ?>>no</option>
							</select>   
		</th>
	</tr>
 <!----------------------------------------------------------------------------------------->
 <!----------------------------------------------------------------------------------------->
 <!----------------------------------------------------------------------------------------->	
	<tr>
		<th>
			aircondition:	<select name="aircondition" >
					<option <?php if($roomData['aircondition']=="yes") echo "selected"; ?> >yes</option>
					<option  <?php if($roomData['aircondition']=="no") echo "selected"; ?>>no</option>
					</select>
		</th>
	</tr>
 <!----------------------------------------------------------------------------------------->
 <!----------------------------------------------------------------------------------------->
 <!----------------------------------------------------------------------------------------->	
		<th>
		
			<input type='submit' value='submit'  value='Submit'/>
		</th>
		
</table>
 <!----------------------------------------------------------------------------------------->
 <!----------------------------------------------------------------------------------------->
 <!----------------------------------------------------------------------------------------->    
	
</form>
</body>
</html>



<?php

?>