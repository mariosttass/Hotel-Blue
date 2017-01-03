<?php

//notLogged user
require("./connection.php");

//type='password' gia na min fenetai to pass
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<!-- η κληση του αρχειου css-->
<link rel="stylesheet" type="text/css" href="style.css">
<!--για να μπορουμε να γραφουμε στα ελληνικα μεσα στην σελιδα    -->
<meta charset="utf-8">
<!-- περιεχει το εξώφυλλο της σελιδας κ το στυλ του μενου κ το ονομα του ξενοδοχειου    -->
<style rel="stylesheet" type="text/css" href="style.css">

body
{

background-image:url('kefalonia.jpg');

}

c1
{
	color:blue;
	font-size:40px;
	font-family:Arial,Calibri;
	text-shadow:5px 5px 2px #191919;
}


c2
{
	font-size:18px;
	font-family:Arial,Calibri;
	text-decoration:none;
}


@-moz-document url-prefix() {
.selector {
/* definitions go here */
}
}
/* καθορισμος που θα βρισκεται ο πινακας του login μεσα στην σελιδα  */
.midNotlogin
{
position:absolute;
right:-075px;
top:-50px;
width:250px;



}
/* ορισμός μεγεθους κ γραμματοσειρας της παραγραφου */
.stylNotlogin
{
	font-family:Arial,Calibri;
	font-size:16px;
	
}

/*το στυλ που θα εχει ο υπερσυνδεσμος ακομα κ οταν το ποντίκι το πατάει */
.pushLogin
{
color:black; 
text-decoration:none;
}

	
</style>

 
</head>
<body>

<!--δημιουργια της φορμας για το login    -->

<form method='Post' action ='check_login.php' class='midNotlogin'>
<!-- τα πεδια της μπαινουν σε ενα πινακα -->
<table  border="5" bgcolor="#FFFFD1">





		<tr><th><label>Είσοδος Χρήστη : </label></td></th> <br/>
		<tr><td><label>username:</label></td></tr>  <td><input type='text' name='username'/></td> <br />
		<tr><td><label>password:</label></td></tr>  <td><input type='password' name='password'/></td> <br/>
	
		<tr><td> <input type='submit' value='Login'></td></tr>
		

</table>
</form>


<!-- δημιουργία βασικού πίνακα ο οποίος περιέχει εικόνες κείμενο και το μενού   -->

<table border="0" align="center" bgcolor="#FFFFD1" width="800" height="635">
<!--δημιουργία του ονόματος του ξενοδοχείου κ του μενού    -->
<tr align="top" width="150" height="100">
<td colspan="3">&nbsp; &nbsp; &nbsp; &nbsp;<c1>Hotel Blue</c1> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <c2>Αρχική Σελίδα</c2> &nbsp; <c2>Διαμονή</c2> &nbsp; <a href="http://www.web-greece.gr/map_greece/maps/maps_islands/map_kefalonia_big.gif" target="_blank" class='pushLogin'><c2><span>Χάρτης</span></c2></a></td>
</tr>

<tr>
</tr>
<!-- εισαγωγη των εικόνων   -->
<tr>
<td>&nbsp; &nbsp; &nbsp;<img src="argostoli_panoramikh.jpg" align="center" width="350" height="300" border="5"> 
&nbsp; &nbsp; &nbsp; &nbsp;
<img src="images.jpg" align="center" width="350" height="300" border="5"></td>
</tr>

<!-- εισαγωγή της παραγράφου   -->
<tr align="center" width="50" height="50">
<td><p class='stylNotlogin'><b><i>Καλώς ήλθατε στο Hotel Blue στο Αργοστόλη της Κεφαλονιάς.</i></b><br> 
Το <span style="color:blue;font-weight:bold">Hotel Blue</span> σας καλωσορίζει σε ένα άνετο και φιλικό περιβάλλον
και υπόσχεται να περάσετε τις καλύτερες διακοπές. Το νησί είναι ένα απο τα ομορφότερα της Ελλάδας και 
μπορείτε να δείτε τα χωριά του νησιού με τα γραφικά στενά και με τις πολύ ωραίες και μεγάλες παραλίες.
</p></td></tr>
<tr>
</tr>


</table>

</body>
</html>