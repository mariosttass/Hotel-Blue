<?php
//connection me tin bash
$link=mysql_connect("localhost", "root", "123");
$seldb=mysql_select_db("hotelblue");

if(!$link) {
die("Could not connect to host");
}
mysql_query("SET NAMES 'utf8' COLLATE 'utf8_unicode_ci'");


if(!$seldb) {
die("Could not connect to database");
}

?>