<?php
//logged admin
$path=$_SERVER["SCRIPT_FILENAME"];
$path=dirname($path);
require("functionsUser.php");
require("functionsAdmin.php");


require($path."./connection.php");
// lathos na to dlt include "C:/xampp/htdocs/hotelblue/view/newRoomForm.php";

// gia na min krataei to room id kai kathe fora p kanoume update mas paei sto idio room id
if(isset($_SESSION['room_id']))
{
$_SESSION['room_id']=null;
}

// gia na min krataei to room_name  kai kathe fora p kanoume update mas paei sto idio room_name 
if(isset($_SESSION['room_name']))
{
$_SESSION['room_name']=null;
}

?>


<!DOCTYPE html>
		

<html>
<body>
<head> 
<meta http-equiv="content-type"  content="text/html;charset=utf-8" />
<style>

.mid
{
position:absolute;
right:500px;
width:400px;
background-color:#b0e0e6;
}
.mid1
{
position:absolute;
right:000px;
width:250px;
background-color:#b0e0e6;
}
table
{
border-collapse:collapse;
position:absolute;
}
table, td, th
{
border:1px solid black;

}
table
{
width:90%;
}
th
{
height:40px;
}


</style>
</head>

<body>

<b class='mid'>
 
<?php echo"<p>Welcome Boss  <b>".$_SESSION["admin_name"]."</b></p>"; ?>
<!-- add new room  -->
<form method='post' action = 'newRoomForm.php'>
<input type='submit' value='add new room'  />
</form>
<!-- add price for room types and season  -->
<form method='post' action = 'newRoomPriceForm.php'>
<input type='submit' value='add prices for room type'  />
		<select name="room_name">
						<option>sgl</option>
						<option>twin</option>
						<option>dbl</option>
						<option>triple</option>
						<option>quadraple</option>
						<option>suit</option>
		</select>		  

</form>

<form method='post' action = 'updateRoomForm.php'>
<input type='submit' value='Update room'  />
<!-- na balw sto value tou room id check mono gia auta p yparxoun kai na to kanw kai select gia tin wra den exei tpt-->
<input type='text'  name='room_id'/>
</form>




</b>




</body>
</html>



<?php
echo "<p class='mid1'> <a href='./logout.php'> logout </a> </p>";



//--------------------------------------------------------------------------------------
//------------------- SHOWING ALL ROOMS----------------------------------------------------
//--------------------------------------------------------------------------------------
echo "<br /><br /><br /><br /><br /><br /><br />";
echo "Rooms:";
$showAllRomm_query=showAllRoom();
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
while($row = mysql_fetch_row($showAllRomm_query))
			{
			
			echo "<tr> ";

			// $row is array... foreach( .. ) puts every element
			// of $row to $cell variable
			foreach($row as $cell)
				echo "<td>  $cell</td> ";

			echo "</tr>";
			
			 }
echo "</table>";
echo "<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";



//--------------------------------------------------------------------------------------
//------------------- PRICE for each room type------------------------------------------
//--------------------------------------------------------------------------------------
echo "Prices:";
$showAllRoomPrices_query=showAllRoomPrices();
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

while($row = mysql_fetch_row($showAllRoomPrices_query))
			{
			
			echo "<tr> ";
			// $row is array... foreach( .. ) puts every element
			// of $row to $cell variable
			foreach($row as $cell)
				echo "<td>  $cell </td> ";

			echo "</tr>";
			
			 }
					
   echo "</table>";    
	  echo "<br /><br /><br /><br />";
?>


