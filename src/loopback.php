<?php
error_reporting(E_ALL);
ini_set('display_errors',0);
header('Content-type: text/html');

echo '<!DOCTYPE html>
<html lang = "en">
<head>
<meta charset ="utf-8" />
<title>Parameter Parser (loopback.php)</title>
</head>
<body>'; 


$request= $_SERVER['REQUEST_METHOD'];
if ($request === 'POST'){
  $myObj = "{\"Type\": \"POST\", \"parameters\":";
  // detect if the POST contained any parameters
  if (count($_POST) >= 1){
    $myObj .="{";
    $myCount = 0; 
    foreach ($_POST as $key => $value) {
      if ($myCount > 0){
        $myObj .= ",";   //add a comma before every parameter except first one
      }
      $myObj .="\"".$key."\":".$value;
      $myCount++; 
    }
    $myObj .= "}}";

  } else {
    $myObj .= "NULL}";
  }
  

} elseif($request ==="GET"){
  $myObj = "{\"Type\": \"GET\", \"parameters\":";
  // detect if the get contained any parameters
  if (count($_GET) >= 1){
    $myObj .="{";
    $myCount = 0; 
    foreach ($_GET as $key => $value) {
      if ($myCount > 0){
        $myObj .= ",";   //add a comma before every parameter except first one
      }
      $myObj .="\"".$key."\":".$value;
      $myCount++; 
    }
    $myObj .= "}}";

  } else {
    $myObj .= "NULL}";
  }
  
} else {
  $myObj .= "{\"Type\":NULL, \"Parameters\": NULL}";
}


//Now that the object is built, echo it to screen.
echo "<p>".$myObj."</p>";

?>