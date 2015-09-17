<?php

//The array of file paths to cards in the entire deck
$deck = array();

//The array of player fo this game
$players = array('Rihcard Ciampa', 'Andrew Richardson', 'Susan Espnoza', 'Brandon Saletta' );

//Get a reference to all the cards in the different directories
$cardDirs = array("./img/cards/clubs/*",
                  "./img/cards/diamonds/*",
                  "./img/cards/hearts/*",
                  "./img/cards/spades/*");


//Collect the files in the $deck array
for ($i=0; $i < 4 ; $i++) { 
	// Add the cards from each directory to the array
	foreach (glob($cardDirs[$i]) as $file) {
		array_push($deck, $file);
	}
}


//Now lets shuffle the $deck array
shuffle($deck);

//Testing the contents
print_r($deck);

/*
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
*/

?>
