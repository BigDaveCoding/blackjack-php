<?php
declare(strict_types=1);
class Card {
    // declaring properties that belong to card object
    // public means they can be accessed from anywhere
    public string $suit;
    public string $name;
    public int $score;

    // Constructor method - __construct
    // Runs when a new card object is created
    public function __construct(string $suit, string $name, int $score){
        // $this keyword refers to the current object
        // -> is used to access properties and methods of an object
        // when a card is created construct runs automatically
        // sets the variables of the created card to properties of object using $this->
        // so when new card is created with passed in parameters
        // it creates a card referring to the properties
        $this->suit = $suit;
        $this->name = $name;
        $this->score = $score;
    }
}