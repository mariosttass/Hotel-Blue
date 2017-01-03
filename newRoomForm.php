<?php
//logged admin
$path=$_SERVER["SCRIPT_FILENAME"];
$path=dirname($path);

require($path."./connection.php");


?>

<html>

<head>
<p align='center'> FORM for a new ROOM .</p>
<style>
p{font-family: Arial, Helvetica, san-serif; color: blue}
body {background-color:#b0c4de;} 
.mid
{
position:absolute;
right:100px;
width:300px;
background-color:#b0e0e6;
}


</style>
</head>
<!-- add action px newRoomDao.php-->
<!--   <form method='Post' action='./newRoomDao.php'> -->
<body>
<form method='Post' action='./newRoomDao.php' enctype='multipart/form-data' class='mid'>
<table border='7'>
	<tr>
		<th >
		room_type:<!-- <input type='text' name='room_type' class='red'/> -->
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
<br />
	<tr>
		<th>
		square_meters:<input type='text' name='square_meters'/>  
		</th>
	</tr>
	
<br />
	<tr>
		<th>
				tv:<select name="tv">
				<option value='yes' >yes</option>
                <option value='no' selected='selected' >no</option>
				</select>
		</th>
	</tr>
	
<br />
	<tr>
		<th>
		internet:<select name="internet">
				<option value='yes' >yes</option>
                <option value='no' selected='selected' >no</option>
				</select>
		</th>
	</tr>
	
<br />
	<tr>
		<th>
		view:<input type='text' name='view'/>  
		</th>
	</tr>
	
<br />
	<tr>
		<th>
		phone:<select name="phone">
				<option value='yes' >yes</option>
                <option value='no' selected='selected' >no</option>
				</select>
		</th>
	</tr>
	
<br />
	<tr>
		<th>
		mini_bar:<select name="mini_bar">
				<option value='yes' >yes</option>
                <option value='no' selected='selected' >no</option>
				</select>
		</th>
	</tr>
	
<br />
	<tr>
		<th>
		fridge:<select name="fridge">
				<option value='yes' >yes</option>
                <option value='no' selected='selected' >no</option>
				</select>
		</th>
	</tr>
	
<br />
	<tr>
		<th>
		aircondition:<select name="aircondition">
				<option value='yes' >yes</option>
                <option value='no' selected='selected' >no</option>
				</select>
		</th>
	</tr>
	

<br />
	<tr>
		<th>
		floor:<select name="floor">
				<option value='0' selected='selected'>0</option>
                <option value='1'  >1</option>
				<option value='2'  >2</option>
				<option value='3'  >3</option>
				<option value='4'  >4</option>
				<option value='5'  >5</option>
				</select>
		</th>
	</tr>
	
<br />
</table>
     <div>
		
			<b> Add foto from room:</b>
			<input type='file' name='image' id='file'><br>
	</div>

	<input type='submit' value='submit'  value='Submit'/>
	
</form>


</body>
</html>



<?php

?>