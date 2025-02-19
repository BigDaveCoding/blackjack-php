<?php
declare(strict_types=1);

class Player {
    // declaring property of playerCards as an empty array
    public array $playerCards = [];

    public function __construct(array $playerCards){
        // This objects playerCards is equal to playerCards passed in when object is created
        // Will in most cases pass in an empty array unless testing
        $this->playerCards = $playerCards;
    }

    // public function to add a card to the players hand
    // Takes a Card data type (my card class/object) and adds it to players cards
    public function addCardToHand(Card $card): void{
        $this->playerCards[] = $card;
    }

    //function which returns players cards, so I can display them for debugging etc.
    // Can further edit this function to display information about the cards
    public function displayCards(): array{
        return $this->playerCards;
    }
}