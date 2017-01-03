<?php
session_start();
require("functionsUser.php");
if(!isset($_SESSION['username'])) header("location: ./");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Profile System</title>
<link type="text/css" rel="stylesheet" href="styles.css" />
</head>

<body>

<div id="container">
	<div id="menu">
		<a href="index.php">Home</a>
		<a href="accountUser.php">Account</a>
		<a href="profileUser.php">Profile</a>
		<a href="logout.php">Logout</a>
		
	</div>
    <?php $usersData = getUsersData(getId($_SESSION['username']));  ?>
	
    <strong><u>Update Your Name</u></strong>
	<!-- action update-->
    <form action="accountUser.php?update=name" method="POST">
    	First Name: <input type="text" maxlength="15" name="fName" value="<?php if(isset($_POST['fName'])) echo trim(mysql_real_escape_string($_POST['fName'])); else echo $usersData['firstname']; ?>" />
        Last Name: <input type="text" maxlength="15" name="lName" value="<?php if(isset($_POST['lName'])) echo trim(mysql_real_escape_string($_POST['lName'])); else echo $usersData['lastname']; ?>" /><br />
        <input type="submit" name="nameSubmit" value="Update" />
    </form>
	<?php
		if(isset($_GET['update']) && $_GET['update']=="name")
		{
			$firstName = trim(mysql_real_escape_string($_POST['fName']));
			$lastName = trim(mysql_real_escape_string($_POST['lName']));
			
			$errors = array();
			if(strlen($firstName)>15)
				$errors[] = "Your first name is too long";
			if(strlen($lastName)>15)
				$errors[] = "Your last name is too long";
				
			if(empty($errors))
			{
				if(updateFirstLastName($usersData['id'],$firstName,$lastName))
					echo "Updated!";
				else
					echo "An Error Has Occurred!";
			}
			else
				foreach($errors as $e)
					echo $e."<br />";
		}
	?>
    <hr />
    <strong><u>Update About Me</u></strong>
    <form action="accountUser.php?update=aboutMe" method="POST">
    	<textarea name="aboutMe" maxlength="100" rows="5" cols="30"><?php if(isset($_POST['aboutMe'])) echo trim(mysql_real_escape_string($_POST['aboutMe'])); else echo $usersData['aboutme']; ?></textarea><br />
        <input type="submit" name="aboutMeSubmit" value="Update" />
    </form>
    <?php
		if(isset($_GET['update']) && $_GET['update']=="aboutMe")
		{
			$aboutMe = trim(mysql_real_escape_string($_POST['aboutMe']));
			
			$errors = array();
			if(strlen($aboutMe)>100)
				$errors[] = "Your about me is too long";
				
			if(empty($errors))
			{
				if(updateAboutMe($usersData['id'],$aboutMe))
					echo "Updated!";
				else
					echo "An Error Has Occurred!";
			}
			else
				foreach($errors as $e)
					echo $e."<br />";
		}
	?>
    <hr />
    <strong><u>Update Birthday</u></strong>
    <form action="accountUser.php?update=birthday" method="POST">
		Day: <select name="day">
				<option>01</option>
                <option>02</option>
                <option>03</option>
                <option>04</option>
                <option>05</option>
                <option>06</option>
                <option>07</option>
                <option>08</option>
                <option>09</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
                <option>13</option>
                <option>14</option>
                <option>15</option>
                <option>16</option>
                <option>17</option>
                <option>18</option>
                <option>19</option>
                <option>20</option>
                <option>21</option>
                <option>22</option>
                <option>23</option>
                <option>24</option>
				<option>25</option>
                <option>26</option>
                <option>27</option>
                <option>28</option>
                <option>29</option>
                <option>30</option>
                <option>31</option>
        	</select>
			Month: <select name="month">
				<option value="01">Jan</option>
				<option value="02">Feb</option>
				<option value="03">Mar</option>
				<option value="04">Apr</option>
				<option value="05">May</option>
				<option value="06">Jun</option>
				<option value="07">Jul</option>
				<option value="08">Aug</option>
				<option value="09">Sept</option>
				<option value="10">Oct</option>
				<option value="11">Nov</option>
				<option value="12">Dec</option>
            	</select>
			Year: <select name="year">
				<option>1990</option>
				<option>1991</option>
				<option>1992</option>
				<option>1993</option>
				<option>1994</option>
				<option>1995</option>
				<option>1996</option>
				<option>1997</option>
			</select><br />
        <input type="submit" name="birthdaySubmit" value="Update" />
    </form>
    <?php
		if(isset($_GET['update']) && $_GET['update']=="birthday")
		{
			$day = $_POST['day'];
			$month = $_POST['month'];
			$year = $_POST['year'];
			
			$birthday = mktime(0,0,0,$month,$day,$year);
			
			if(updateBirthday($usersData['id'],$birthday))
				echo "Updated!";
			else
				echo "An Error Has Occurred!";
		}
	?>
    <hr />
    <strong><u>Update Country/City</u></strong>
    <form action="accountUser.php?update=countryCity" method="POST">
        Country: <input type="text" maxlength="50" name="country" value="<?php if(isset($_POST['country'])) echo trim(mysql_real_escape_string($_POST['country'])); else echo $usersData['country']; ?>" />
        City: <input type="text" maxlength="50" name="city" value="<?php if(isset($_POST['city'])) echo trim(mysql_real_escape_string($_POST['city'])); else echo $usersData['city']; ?>" /><br />
        <input type="submit" name="countryCitySubmit" value="Update" />
    </form>
    <?php
		if(isset($_GET['update']) && $_GET['update']=="countryCity")
		{
			$country = trim(mysql_real_escape_string($_POST['country']));
			$city = trim(mysql_real_escape_string($_POST['city']));
			
			$errors = array();
			if(strlen($country)>50)
				$errors[] = "Your country name is too long";
			if(strlen($city)>50)
				$errors[] = "Your city name is too long";
				
			if(empty($errors))
			{
				if(updateCountryCity($usersData['id'],$country,$city))
					echo "Updated!";
				else
					echo "An Error Has Occurred!";
			}
			else
				foreach($errors as $e)
					echo $e."<br />";
		}
	?>
    <hr />
    <strong><u>Update Profile Picture</u></strong><br />
    <i>Allowed Extensions: *.jpg *.jpeg *.png</i>
    <form action="accountUser.php?update=profilePicture" method="POST" enctype="multipart/form-data">
    	<input type="file" name="profilePicture" /> <input type="submit" name="profilePictureSubmit" value="Update">
    </form>
    <?php if($usersData['profileext']!="n/a"){ ?>
    	<form action="accountUser.php?update=resetProfilePictureStep1" method="POST" >
    		<input type="submit" name="profilePictureStep1Submit" value="Reset">
    	</form>
    <?php } ?>
    <?php if(isset($_GET['update']) && $_GET['update']=="resetProfilePictureStep1"){ ?>
    	<form action="accountUser.php?update=resetProfilePictureStep2" method="POST" >
        	<input type="hidden" name="resetProfilePictureID" value="<?php echo $usersData['id']; ?>">
            This will permanently delete the image from the server. Please confirm.
    		<input type="submit" name="profilePictureStep2Submit" value="Confirm Reset">
    	</form>
    <?php } ?>
    <?php
		if(isset($_GET['update']) && $_GET['update']=="profilePicture")
		{
			$type = $_FILES["profilePicture"]["type"];
			$size = $_FILES["profilePicture"]["size"];
			
			$errors = array();
			if($type == "image/jpeg" || $type == "image/jpg" || $type == "image/png")
			{
				$explode = explode(".",$_FILES["profilePicture"]["name"]);
				$ext = end($explode);
				$extData =mysql_real_escape_string(file_get_contents($_FILES['profilePicture']['tmp_name']));
			
			}
			else
				$errors[] = "File Format Not Allowed!";
			if($size > 1048576)
				$errors[] = "File Size Too Big! 1MB Limit";
			
			if(empty($errors))
			{	
				if(updateProfilePicture($usersData['id'],$extData))
					echo "Updated!";
				else
				{
				
					echo "An Error Has Occurred!";}
				}
			else
				foreach($errors as $e)
					echo $e."<br />";
		}
		
		if(isset($_GET['update']) && $_GET['update']=="resetProfilePictureStep2")
		{
			$id = mysql_real_escape_string($_POST['resetProfilePictureID']);
			if(resetProfilePicture($usersData['id'],$usersData['profileext']))
					echo "Updated!";
				else
					echo "An Error Has Occurred!";
		}
	?>
</div>

</body>
</html>