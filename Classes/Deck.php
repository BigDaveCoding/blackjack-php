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
        shuffle($this->deck);
    }
}