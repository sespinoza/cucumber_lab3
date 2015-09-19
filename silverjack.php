<?php

//The array of file paths to cards in the entire deck
$deck = array();

//The array of player fo this game
$players = array(
                  'Rihcard Ciampa'=>array(
				                   'cards'=>array(),
								   'handTotal'=>'',
								   'pic'=>'',
								   'win'=>'false'),
                  'Andrew Richardson'=>array(
				  				   'cards'=>array(),
								   'handTotal'=>'',
								   'pic'=>'',
								   'win'=>'false'),
                  'Susan Espnoza'=>array(
				  				   'cards'=>array(),
								   'handTotal'=>'',
								   'pic'=>'',
								   'win'=>'false'),
                  'Brandon Saletta'=>array(
				  				   'cards'=>array(),
								   'handTotal'=>'',
								   'pic'=>'',
								   'win'=>'false')
				  );

//Get a reference to all the cards in the different directories
$cardDirs = array("./img/cards/clubs/*", "./img/cards/diamonds/*", "./img/cards/hearts/*", "./img/cards/spades/*");

//Collect the files in the $deck array
for ($i = 0; $i < 4; $i++) {
	// Add the cards from each directory to the array
	foreach (glob($cardDirs[$i]) as $file) {
		array_push($deck, $file);
	}
}

//Now lets shuffle the $deck array
shuffle($deck);

//Deal the cards for each user
function deal() {

	global $deck;
	//Call the global var for the deck array
	$handTotal = 0;
	//The hand card sum. The closest to 45 with going over wins
	$handValuesDealt = array();

	//We use a do loop becuase we need to do it once for sure
	do {

		//Get the card file path information to store if it is usable
		$cardDealt = $deck[count($deck) - 1];

		/*
		 * Get the value of the card to both compare and add to the
		 * total if it is not a duplicate value.
		 *
		 * The game rules state that each player can not recieve duplicate
		 * card values
		 */
		$cardValue = substr(substr($deck[count($deck) - 1], (strrpos($deck[count($deck) - 1], "/") + 1)), 0, -4);

		//Check that the card value has not already been dealt from the deck
		if (!isValueDealt($handValuesDealt, $cardValue)) {
			//Add the card to the hand
			array_push($handValuesDealt, $cardValue);
			//Remove the card from the deck
			array_pop($deck);
			//Add the sum to the total
			$handTotal += $cardValue;

			//Testing only REMOVE for production release
			echo "<br/> Card Value: ";
			echo $cardValue;
			echo "<br/> Card file path: ";
			echo $cardDealt;
			echo "<br/> Hand Total: ";
			echo $handTotal;
			echo "<hr/>";
		} else {
			shuffle($deck);
		}

	} while($handTotal < 45 && (count($handValuesDealt) < 8));

	echo "<br/>";
	print_r($handValuesDealt);

}

function isValueDealt($handValuesDealt, $cardValue) {
	foreach ($handValuesDealt as $value) {
		if ($cardValue == $value) {
			return TRUE;
		}
	}
	return FALSE;
}

//Lets deal a round fo cards
deal();

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
