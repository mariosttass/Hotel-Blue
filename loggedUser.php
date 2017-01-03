<?php
//logged user
require("./connection.php");
echo"<p>Welcome <b>".$_SESSION["user_name"]."</b></p>";

echo "<p> <a href='./logout.php'> logout </a> </p>";




?>