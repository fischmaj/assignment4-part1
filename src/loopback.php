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
  $myObj = '{"Type": "POST",';
  // detect if the post contained any parameters
  if (count($_POST >= 1){
    foreach ($_POST as $key => $value) {
      $myObj += $key.":".$value;
    }
    $myObj += "}";

  } else {
    $myObj += '"Parameters: NULL}";
  }

} else if ($request === 'GET'){
  $myObj = '{"Type": "GET",';
  // detect if the get contained any parameters
  if (count($_GET >= 1){
    foreach ($_GET as $key => $value) {
      $myObj += $key.":".$value;
    }
    $myObj += "}";

  } else {
    $myObj += '"Parameters: NULL}";
  }
}

echo $myObj;

?>