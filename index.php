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
$amountOfPlayers = 4;
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

$playerScores = [];

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
        if ($playerScore > 21){
            $player->playerHasAceScoreOverTwentyOne();
            $playerScore = $player->scoreOfCardsInHand();
        }
    }
    $playerScores[$player->name] = $playerScore;
    //display player cards
    echo $player->displayCards();
    //display player score of cards
    echo "<p>Total score of $player->name cards: " . $playerScore . "</p>";
}

function results(array $playerScores): string {
    $dealerScore = 0;
    $output = "<div>";
    $output .= "<h1>RESULTS!</h1>";
    foreach ($playerScores as $name => $score){
        if ($name == 'Dealer') {
            $dealerScore = $score;
            continue;
        }
        $output .= "<p>";
        if ($score <= 21 && $dealerScore > 21){
            $output .= "<p>$name Wins! The dealer went bust</p>";
        }
        if ($score <= 21 && $dealerScore <= 21 && $score > $dealerScore){
            $output .= "<p>$name has beat the dealer. You win!</p>";
        } else if ($dealerScore <=21 && $score <= 21 && $score == $dealerScore){
            $output .= "<p>$name has the same score as the dealer. It's a draw!</p>";
        } else if ($score > 21){
            $output .= "<p>$name has over 21. You've gone bust!</p>";
        } else if ($score < $dealerScore && $dealerScore <= 21){
            $output .= "<p>The dealer has better cards than $name. You lose! :(</p>";
        }
    }
    $output .= "</div>";
    return $output;
}

echo results($playerScores);