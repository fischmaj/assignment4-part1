<!DOCTYPE html>
<html lang ="en">
<head>
<meta charset ="utf-8">
<title>Login Screen (login.php)</title>
</head>

<body>
<?php

function createForm ($reset){
  echo "<form action = \"http://localhost/~fschmps314/";
  echo "assignment4-part1/content1.php\" method = \"POST\"> ";
  echo "<H3>USER NAME:</H3>";
  echo "<input type= \"text\" name = \"login\" >";

  if (!$reset) { //user was not logged out, so submitting should 
                 //command content1.php to destroy old session.
    echo "<input type =\"hidden\" name =\"logout\" value =\"true\">";
 
  echo "<br><input type =\"submit\" value =\"SUBMIT\">";
  echo "</form>";
}


//EXECUTION BEGINS HERE:
$logout = $_POST["logout"];  //See if logout commanded from previous page.

//if a user is logged in and sending page didn't post a 'logout' command
//then provide the user a warning and a way to return to content
if ( isset($_SESSION["userID"]) && !$logout ){
                           
  $user = $_SESSION["userID"];
  echo "<br><H4> You are already logged in, $user. If you ";
  echo "would like to continue to content click <a href = ";
  echo "\"http://localhost/~fschmps314/assignment4-part1/";
  echo "content1.php\"> HERE</a> ";
  echo "or press your browser's back button to leave without logout. ";
  echo " <br>Otherwise entering a new";
  echo " login ID below will log out user=$user.";

} else {  //either userID is not set or logout is true, so destroy session

  session_unset();
  session_destroy();
}


createForm($logout);  //if logout is false, form will pass logout command to
                      //content1.php silently.  


?>
</body>
