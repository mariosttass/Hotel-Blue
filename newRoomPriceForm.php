<?php
//logged admin
$path=$_SERVER["SCRIPT_FILENAME"];
$path=dirname($path);
session_start();

require($path."./connection.php");
require("functionsAdmin.php");
if(!isset($_SESSION['room_name']))
{
$_SESSION['room_name']=$_POST['room_name'];	
}


//$roomPriceData = getRoomPriceData($_SESSION['room_name']);
//echo $roomPriceData['price_id'];

$roomPriceData = getRoomPriceData($_SESSION['room_name']);


echo "<br /><br /><br />";


echo "<table border=2>";
echo"
<tr>
<th>Room price id</th>
<th>Room_Type</th>
<th>January</th>
<th>February</th>
<th>March</th>
<th>April</th>
<th>May</th>
<th>June</th>
<th>July</th>
<th>August</th>
<th>September</th>
<th>October</th>
<th>November</th>
<th>December</th>

</tr>

";
//edw emfanizoume ta stoixeia tou sygkekrimenou room mesa sto table 
//wste na mporei na blepei gia na allaksei kati..		
			echo "<tr> ";
			foreach($roomPriceData as $cell)
				echo "<td> $cell</td> ";

			echo "</tr>";
			
			 
echo "</table>";

?>

<html>

<head>
<p align='center'> ADD PRICE FORM</p>
<style>

</style>
</head>

<body>



<form method='Post' action='./newRoomPriceDao.php'>
<table border='1' align='center'>
	<tr>
		<th >
		room_type:
				<select name="room_type">
				<option value='sql' >sql</option>
                <option value='twin'>twin</option>
				<option value='dbl'>dbl</option>
				<option value='triple'>triple</option>
				<option value='quadraple'>quadraple</option>
				<option value='suit'>suit</option>
				</select>
				
		</th>
		
	</tr>
	
	
	<tr>
		<th>
		January:<input type='text' name='January' value="<?php if(isset($_POST['January'])) echo trim(mysql_real_escape_string($_POST['January'])); else echo $roomPriceData['January']; ?>"/>  
		</th>
	</tr>
	
	<tr>
		<th>
		February:<input type='text' name='February' value="<?php if(isset($_POST['February'])) echo trim(mysql_real_escape_string($_POST['February'])); else echo $roomPriceData['February']; ?>"/>   
		</th>
	</tr>

	<tr>
		<th>
		March:<input type='text' name='March' value="<?php if(isset($_POST['March'])) echo trim(mysql_real_escape_string($_POST['March'])); else echo $roomPriceData['March']; ?>"/>  
		</th>
	</tr>
	

	<tr>
		<th>
		April:<input type='text' name='April' value="<?php if(isset($_POST['April'])) echo trim(mysql_real_escape_string($_POST['April'])); else echo $roomPriceData['April']; ?>"/>   
		</th>
	</tr>

	<tr>
		<th>
		May:<input type='text' name='May' value="<?php if(isset($_POST['May'])) echo trim(mysql_real_escape_string($_POST['May'])); else echo $roomPriceData['May']; ?>"/>   
		</th>
	</tr>

	<tr>
		<th>
		June:<input type='text' name='June' value="<?php if(isset($_POST['June'])) echo trim(mysql_real_escape_string($_POST['June'])); else echo $roomPriceData['June']; ?>"/>   
		</th>
	</tr>

	<tr>
		<th>
		July:<input type='text' name='July'  value="<?php if(isset($_POST['July'])) echo trim(mysql_real_escape_string($_POST['July'])); else echo $roomPriceData['July']; ?>"/>    
		</th>
	</tr>
	
	<tr>
		<th>
		August:<input type='text' name='August' value="<?php if(isset($_POST['August'])) echo trim(mysql_real_escape_string($_POST['August'])); else echo $roomPriceData['August']; ?>"/>    
		</th>
	</tr>
	
	<tr>
		<th>
		September:<input type='text' name='September' value="<?php if(isset($_POST['September'])) echo trim(mysql_real_escape_string($_POST['September'])); else echo $roomPriceData['September']; ?>"/>    
		</th>
	</tr>

	<tr>
		<th>
		October:<input type='text' name='October' value="<?php if(isset($_POST['October'])) echo trim(mysql_real_escape_string($_POST['October'])); else echo $roomPriceData['October']; ?>"/>    
		</th>
	</tr>
	
	<tr>
		<th>

		November:<input type='text' name='November' value="<?php if(isset($_POST['November'])) echo trim(mysql_real_escape_string($_POST['November'])); else echo $roomPriceData['November']; ?>"/>    
		</th>
	</tr>

	<tr>
		<th>
		
		December:<input type='text' name='December' value="<?php if(isset($_POST['December'])) echo trim(mysql_real_escape_string($_POST['December'])); else echo $roomPriceData['December']; ?>"/>   
		</th>
		
	</tr>
	
<br />
<tr>
	<th>
 <input type="submit" name="updateRoomPrices" value="Update" />
	</th>
</tr>


	
</table>
    
	
</form>


</body>
</html>

