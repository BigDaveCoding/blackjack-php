<?php
declare(strict_types=1);
include './Classes/Card.php';
include './Classes/Deck.php';
include './Classes/Player.php';

// Creating the deck of cards
$deck = new Deck();

// Making a Dealer
$dealer = new Player('Dealer', []);

// creating a variable to test how to create x amount of players
// Will later get the value from a user input
$amountOfPlayers = 3;
// Initialising array to store players with Dealer already appended
$players = [$dealer];

// for loop which runs takes $amountOfPlayers variable.
// creates a new Player object for each player and stores them in $Players array
for ($i = 0; $i < $amountOfPlayers; $i++){
    // creating a player number to pass into the name of Player constructor
    $playerNumber = $i + 1;
    // Appending array with a new Player
    $players[] = new Player("Player $playerNumber", []);
}

// Each player draws 2 cards and adds them to their hand
foreach($players as $player){
    $player->addCardToHand($deck->drawCard());
    $player->addCardToHand($deck->drawCard());
}

// Display players cards
foreach($players as $player){
    // Creating player score variable for each player
    $playerScore = $player->scoreOfCardsInHand();
    // While score is less than 14...
    while ($playerScore <= 14){
        //player draws another card
        $player->addCardToHand($deck->drawCard());
        // player score is updated
        $playerScore = $player->scoreOfCardsInHand();
    }
    //display player cards
    echo $player->displayCards();
    //display player score of cards
    echo "<p>Total score of $player->name cards: " . $playerScore . "</p>";
}

echo "<pre>";
var_dump($players);
echo "<br />";
var_dump($players[0]->name);
echo "<br />";
var_dump($deck);
