<?php

$deck = array();

for($i = 1; $i < 54; $i++){
  array_push($deck, $i);
}

shuffle($deck);

function pullCard(){
  $card = array_pop($deck);

  switch ($card) {
    case $card > 39:
      echo "Club";
      break;

    case $card > 26:
      echo "Spade";
      break;

    case $card > 13:
      echo "Heart";
      break;

    default:
      echo "Diamond";
      break;
  }
}

?>
