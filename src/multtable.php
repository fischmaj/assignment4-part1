<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
header('Content-type: text/html');

echo '<!DOCTYPE html>
<html lang = "en">
<head>
<meta charset ="utf-8" />
<title>Multiplication Table (multtable.php)</title>
</head>
<body>'; 

function check_inputs (&$good, $values) {
  $good = true;
  $error_msg = array (
    0 => "min-multiplicand",
    1 => "max-multiplicand",
    2 => "min-multiplier", 
    3 => "max-multiplier"
  );

  for ($i = 0; $i < 4; $i++){
    if ($values[$i] == NULL) {
      $good = false;
      echo "<p> $error_msg[$i] is missing a value</p>";   
    }
  }

  for ($i = 0; $i < 4; $i++){
    if (!settype($values[$i], "integer") ) {
      $good = false;
      echo "<p> $error_msg[$i] is not a valid integer</p>";   
    }
  }
  
  if ($values[0] > $values[1]){
    echo "<p> min-multiplicand cannot be larger than max-multiplicand.";
    $good = false;
  }

  if ($values[2] > $values[3]){
    echo "<p> min-multiplier cannot be larger than max-multiplier.";
    $good = false;
  }

}


function create_table($values){
  echo '<table><tr><td style="width:30px"></td>';  //produces first empty block
  for ($i =$values[2]; $i <=$values[3]; $i++){
    echo '<td style="width:30px">'.$i.'</td>';
  }
  echo"</tr><tr>";
  for ($i = 0; $i < ($values[1] - $values[0]+1); $i++) {
    $multiplicand = $values[0] + $i;
    echo '<td style="width:30px">'.$multiplicand.'</td>';

    for ($j = 0; $j < ($values[3] -$values[2]+1); $j++) {
      $multiplier = $values[2] +$j;
      echo '<td style="width:30px">'.($multiplier*$multiplicand).'</td>';
    }

    echo"</tr><tr>";
  }
  echo"</tr></table>";
}


$mind = $_GET["min-multiplicand"];
$maxd = $_GET['max-multiplicand'];
$minr = $_GET['min-multiplier'];
$maxr = $_GET['max-multiplier'];

$good_inputs = true;
$inputs = array( $mind, $maxd, $minr, $maxr);


check_inputs($good_inputs, $inputs);
if ($good_inputs){
  create_table($inputs);
}

?>