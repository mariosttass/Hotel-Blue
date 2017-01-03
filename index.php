<?php
echo "<!DOCTYPE html>";
//include apo ton fakelo path to arxeio fullpath.php

include("./paths/fullpath.php");

//full_path pernei tin synartisi full path kai tin ekxorei stin metabliti fullpath.
$fullpath=full_path();

//check an yparxei connection me tin bash.
require($fullpath."/connection.php");

//check an yparxei energopoihmeno session alliws energopoiei
if(!isset($__SESSION)) session_start();


if(isset($_SESSION["id"]))
{
	require($fullpath."/login/logged.php");
}
elseif(isset($_SESSION["id_admin"])){
	
	require($fullpath."/login/loggedAdmin.php");

}
else
{
	require($fullpath."/login/notLogged.php");
}


?>