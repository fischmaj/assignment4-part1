<?php
session_start();
header("Cache-Control: no-cache");
?>

<!DOCTYPE html>
<html lang ="en">
<head>
<meta charset ="utf-8">
<title>2nd Content Screen (content2.php)</title>
</head>

<body>

<?php

if (isset($_SESSION["username"])) { //if a user has logged in
  echo "Hello ".$_SESSION["username"].".<br>";
  echo "Follow this <a href=\"http://localhost/~fschmps314/PHP-Lecture-Code";
  echo "/assignment4-part1/src/content1.php\"> link </a> back to the ";
  echo "content1 page!<br>";

} else {
  echo "A user name must be entered. Click ";
  echo "<a href=\"http://localhost/~fschmps314";
  echo "/PHP-Lecture-Code/assignment4-part1/src/login.php\">";
  echo "here</a> to return to the login screen."; 
}




?>

<form action ="http://localhost/~fschmps314/PHP-Lecture-Code/assignment4-part1/src/login.php" method = "GET">
<button type = "submit" name = "action" value = "logout">LOGOUT</button> 
</form>

</body>
