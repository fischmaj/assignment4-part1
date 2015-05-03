<?php
session_start();

if ($_GET["action"] == "logout") {
  session_unset();
  $_SESSION = array();
  session_destroy();
}
?>

<!DOCTYPE html>
<html lang ="en">
<head>
<meta charset ="utf-8">
<title>Login Screen (login.php)</title>
</head>

<body>
<?php
function createForm (){
  echo "<form action = \"http://localhost/~fschmps314/";
  echo "PHP-Lecture-Code/assignment4-part1/src/content1.php\"";
  echo " method = \"POST\"> ";
  echo "<H3>USER NAME:</H3>";
  echo "<input type= \"text\" name = \"username\" >";
  echo "<br><input type =\"submit\" value =\"SUBMIT\">";
  echo "</form>";
}

createForm();
die();
?>

</body>
