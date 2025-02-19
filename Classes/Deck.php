<?php
declare(strict_types=1);

class Deck {
    // Private means deck can only be accessed inside the Deck class.
    // It's private so it cannot be altered and mess up the integrity of the deck
    // Can control the deck through methods within Deck class
    // For example, Adding, Drawing or shuffling cards
    private array $deck = [];

    // constructor of Deck class.
    // When new Deck() is called, this function runs automatically.

    public function __construct(){
        // Creating two arrays.
        // One array stores the suits
        // One array stores an assoc array of name and score
        $suits = ['Hearts', 'Diamonds', 'Clubs', 'Spades'];
        $nameAndScore = [
            '2' => 2,
            '3' => 3,
            '4' => 4,
            '5' => 5,
            '6' => 6,
            '7' => 7,
            '8' => 8,
            '9' => 9,
            '10' => 10,
            'J' => 10,
            'Q' => 10,
            'K' => 10,
            'A' => 11
            ];
        // For each suit in suits
        foreach($suits as $suit){
            // For each $name and $score in assoc array (key and value)
            // So for each suit, it will run through each name and score in array.
            foreach($nameAndScore as $name => $score){
                // $this refers to current object
                // -> is used to access the property
                // Creates a new card object and passes in the relevant parameters (see Card class)
                $this->deck[] = new Card($suit, (string)$name, $score);
            }
        }
        // Deck is filled with Card objects.

        // Shuffle is built in PHP function
        // Takes an array and randomises the order of elements
//        shuffle($this->deck);

    }

    // private function to generate a random number between 0 and deck length - 1
    // private because I only need to access it within Deck class
    private function randomCardIndex(): int {
        return rand(0, count($this->deck) -1);
    }

    // Private function which removes a card from the deck
    // Will be called inside drawCard function
    // When a card is drawn I want to remove it from the deck
    private function removeCardFromDeck(int $index): void {
        array_splice($this->deck, $index, 1);
    }

    // Public function to draw a card from the deck
    // Returns an Object (Card)
    // uses private function of randomCardIndex() to generate a random index
    public function drawCard(): object{
        $index = $this->randomCardIndex();
        $cardObject = $this->deck[$index];
        $this->removeCardFromDeck($index);
        return $cardObject;
    }
}