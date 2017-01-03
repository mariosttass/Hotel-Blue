<?php
//logged user
require("./connection.php");
require("functionsUser.php");
session_start();
?>
<html>
<head>
<link rel='stylesheet' type='text/css' href='styles.css'> 
<style>
</style>
</head>
<body>
<?php

$profileUsersData = getUsersData(mysql_real_escape_string($_SESSION['id']));
		?>
        <div id="menu">
       		<a href="index.php">Home</a>
        	<a href="accountUser.php">Account</a>
            <a href="logout.php">Logout</a>
        </div>
        <?php if(userExists(mysql_real_escape_string($_SESSION['id']))){ ?>
		<div id="header">
			<?php echo $profileUsersData['firstname']." ".$profileUsersData['lastname']."'s Profile"; ?>
        </div>
        <div id="wrapper">
            <div id="profilePicture">
                <?php
					if($profileUsersData['profileext']=="n/a")
						echo '<img src="images/profile.png" />';
					else
						$id=$profileUsersData['id'];
						echo '<img src="showUserImage.php?id='.$id.'" width="250" height="200">' ;
				?>
            </div>
            <div id="aboutMe">
                <strong><u>About Me</u></strong><br />
                <?php echo $profileUsersData['aboutme']; ?>
            </div>
        </div>
        <div id="userDetails">
            <table width="200" border="0">
            	<tr>
                	<td width="55">Age:</td>
                    <td>
						<?php 
                             $difference = time() - $profileUsersData['birthday'];
							 $age = floor($difference / 31556926);
							 echo $age;
                        ?>
                    </td>
                </tr>
                <tr>
                	<td width="55">Country:</td>
                    <td><?php echo $profileUsersData['country']; ?></td>
				</tr>
                <tr>
                    <td width="55">City:</td>
                    <td><?php echo $profileUsersData['city']; ?></td>
				</tr>
            </table>
        </div>
        <?php } else echo "Invalid ID"; ?>
    	 


</body>
</html>