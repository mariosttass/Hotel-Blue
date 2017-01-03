<?php
//logged user
require("./connection.php");
require("functionsUser.php");
?>

<html>
<head>

<style>
.mid
{
position:absolute;
right:500px;
width:400px;
background-color:#b0e0e6;
}
</style>


</head>
<body>

<form class='mid' >
<p> login user </p>
<p>Welcome <b><?php print($_SESSION["username"]) ?></b></p>

<p> <a href='./logout.php' > logout </a> </p>
<p> <a href='./profileUser.php' > Go to your profile </a></p>
</form>
<form action="searchUser.php" method="POST">
	<input type="text" name="searchterm" placeholder="Search..."><br />
    <input type="submit" value="Search">
</form>




</body>
</html>

