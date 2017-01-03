<?php
echo "<!DOCTYPE html>";
session_start();
include("./paths/fullpath.php");

//tha bgalei san apotelesma ../hotelblue/login emeis omws theloume ../hotelblue
$fullpath=full_path();

//me to dirname pame sto hotelblue i opws alliws onomazetai
$success_path=dirname($fullpath);

require($fullpath."./connection.php");

//pernoume to username kai to password
$user=$_POST["username"];
$pass=$_POST["password"];

// psaxnoume stin bash an yparxoun
$login_user=mysql_query("SELECT * FROM users WHERE username ='".$user."' AND password='".$pass."'");
$login_admin=mysql_query("SELECT * FROM admins WHERE admin_name ='".$user."' AND password='".$pass."'");

$result_user=mysql_num_rows($login_user);
$result_admin=mysql_num_rows($login_admin);
if($result_user==1){
	
	$_SESSION["username"]=$user;
	$user_post=mysql_fetch_array($login_user);
	$_SESSION["id"]=$user_post["id"];

header("Location: index.php");
}
elseif($result_admin==1){
   $_SESSION["admin_name"]=$user;
	$admin_post=mysql_fetch_array($login_admin);
	$_SESSION["id_admin"]=$admin_post["id"];

header("Location: index.php");
}
else {

header("Location: index.php");
}


?>

