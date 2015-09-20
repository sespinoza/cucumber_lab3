<?php

//The array of file paths to cards in the entire deck
$deck = array();

//The array of player fo this game
$players = array('Richard Ciampa' => array('cards' => array(), 'handTotal' => '', 'pic' => './img/pl3.png', 'win' => 'false'),
                 'Andrew Richardson' => array('cards' => array(), 'handTotal' => '', 'pic' => './img/pl1.jpg', 'win' => 'false'),
                 'Susan Espnoza' => array('cards' => array(), 'handTotal' => '', 'pic' => './img/pl4.jpg', 'win' => 'false'),
                 'Brandon Saletta' => array('cards' => array(), 'handTotal' => '', 'pic' => './img/pl2.jpg', 'win' => 'false'));

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
function deal($players) {

	//Call the global var for the deck array
	global $deck;

	foreach ($players as $player => $playerValues) {
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
				$playerValues['handTotal'] += $cardValue;
				//Add the card url to the array
				array_push($playerValues['cards'], $cardDealt);

			} else {//We will reshuffle the deck so we get no duplicates
				shuffle($deck);
			}
		} while($handTotal < 42 && (count($handValuesDealt) < 6));
		//Set the player information for the return
		$players[$player] = $playerValues;
	}
    //return the $players array to the calling code
	return $players;
}

//We need to see if the value of the card has been dealt
function isValueDealt($handValuesDealt, $cardValue) {
	foreach ($handValuesDealt as $value) {
		if ($cardValue == $value) {
			return TRUE;
		}
	}
	return FALSE;
}

//Lets deal a round of cards
$players = deal($players);

?>
