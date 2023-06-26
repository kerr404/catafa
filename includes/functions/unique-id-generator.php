<?php 
function refNum8() {
  $referenceNumber = '';
  $characters = '0123456789';
  $length = strlen($characters);

  for ($i = 0; $i < 8; $i++) {
    $referenceNumber .= $characters[rand(0, $length - 1)];
  }

  return $referenceNumber;
}

function refNum6() {
  $referenceNumber = '';
  $characters = '0123456789';
  $length = strlen($characters);

  for ($i = 0; $i < 6; $i++) {
    $referenceNumber .= $characters[rand(0, $length - 1)];
  }

  return $referenceNumber;
}

 ?>