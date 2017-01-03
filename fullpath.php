<?php

function full_path(){

$path=$_SERVER["SCRIPT_FILENAME"];
$path=dirname($path);
}

?>