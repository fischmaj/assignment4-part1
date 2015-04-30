<?php
echo '<!DOCTYPE html>
<html lang = "en">
<head>
<meta charset ="utf-8" />
<title>Multiplication Table (multtable.php)</title>
</head>
<body>'; 

$min_multiplicand = $_GET["min_multiplicand"];
$max_multiplicand = $_GET['max_multiplicand'];
$min_multiplier = $_GET['min_multiplier'];
$max_multiplier = $_GET['max_multilier'];

$good_inputs = true;

if ($min_multiplicand == NULL) {
  echo '<p>ERROR!  Detected no value for min-multiplicand.</p>';
  $good_inputs = false;
}

if ($max_multiplicand == NULL) {
  echo '<p>ERROR!  Detected no value for max-multiplicand.</p>';
  $good_inputs = false;
}

if ($min_multiplier == NULL) {
  echo '<p>ERROR!  Detected no value for min-multiplier.</p>';
  $good_inputs = false;
}

if ($max_multiplier == NULL) {
  echo '<p>ERROR!  Detected no value for max-multiplier.</p>';
  $good_inputs = false;
}



?>