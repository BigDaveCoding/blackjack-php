<?php
declare(strict_types=1);
include './Classes/Card.php';
include './Classes/Deck.php';

$deckTest = new Deck();

//$randomIndex = $deckTest->randomCardIndex();
//$randomCardFromDeck = $deckTest->drawCard($randomIndex);
$randomCardTest = $deckTest->drawCard();

echo "<pre>";
echo $randomCardTest->name;
echo $randomCardTest->suit;
echo $randomCardTest->score;
echo "<br />";
var_dump($randomCardTest);
echo "<br />";
var_dump($deckTest);
