<?php
error_reporting(E_ALL);
ini_set('display_errors',0);
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

    // test if the value is empty
    if ($values[$i] == NULL) {
      $good = false;
      echo "<p> $error_msg[$i] is missing a value</p>";

    // if non-empty, check for non-integer input   
    } elseif( !(is_numeric($values[$i])) 
        || ((is_numeric($values[$i]) && !($values[$i]== (int)$values[$i])))) {
      $good = false;
      echo "<p> $error_msg[$i] is not a valid integer</p>";

    // if integer input, check for negatives
    } elseif ((is_numeric($values[$i]) && ($values[$i]< 0))) {
      $good = false;
      echo "<p> $error_msg[$i] cannot be negative.</p>";   
    }
  }
  
  //seperately, check the mins against the max's
  if (is_numeric($values[0])
      && is_numeric($values[1])
      && ($values[0] > $values[1])){
    echo "<p> min-multiplicand cannot be larger than max-multiplicand.";
    $good = false;
  }

  if (is_numeric($values[2])
      && is_numeric($values[3])
      && ($values[2] > $values[3])){
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


//Execution begins here-- read the inputs from $_GET
$mind = $_GET["min-multiplicand"];
$maxd = $_GET['max-multiplicand'];
$minr = $_GET['min-multiplier'];
$maxr = $_GET['max-multiplier'];

//Assume inputs are good initially, but check them
$good_inputs = true;
$inputs = array( $mind, $maxd, $minr, $maxr);
check_inputs($good_inputs, $inputs);

//Only if good, create table. 
if ($good_inputs){
  create_table($inputs);
}

?>