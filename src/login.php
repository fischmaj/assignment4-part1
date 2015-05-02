<!DOCTYPE html>
<html lang ="en">
<head>
<meta charset ="utf-8">
<title>Login Screen (login.php)</title>
</head>

<body>
<?php

function createForm ($value){
  echo "<form action = \"http://localhost/~fschmps314/";
  echo "assignment4-part1/content1.php\" method = \"POST\"> ";
  echo "<H3>USER NAME:</H3>";
  echo "<input type= \"text\" name = \"login\" >";
  echo "<br><input type =\"submit\" value =\"SUBMIT\">";
  echo "</form>";
}


if ( isset($_SESSION["userID"]) ){
  //displaying the message above the form for a logged in USER. 
  $user = $_SESSION["userID"];
  echo "<br><H4> You are already logged in, $user. If you ";
  echo "would like to continue to content click <a href = ";
  echo "\"http://localhost/~fschmps314/assignment4-part1/";
  echo "content1.php\"> HERE</a>. <br>Otherwise entering a new";
  echo " login ID below will log out user=$user.";

  createForm($user);
 } else {
  $user = "ENTER YOUR USERNAME HERE";
  createForm($user);
}

?>
</body>