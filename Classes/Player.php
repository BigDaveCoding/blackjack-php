<?php
declare(strict_types=1);

class Player {
    // declaring property of playerCards as an empty array
    public string $name;
    public array $playerCards = [];

    public function __construct(string $name, array $playerCards){
        // This objects playerCards is equal to playerCards passed in when object is created
        // Will in most cases pass in an empty array unless testing
        $this->name = $name;
        $this->playerCards = $playerCards;
    }

    // public function to add a card to the players hand
    // Takes a Card data type (my card class/object) and adds it to players cards
    public function addCardToHand(Card $card): void{
        $this->playerCards[] = $card;
    }

    //function which returns players cards, so I can display them for debugging etc.
    // Can further edit this function to display information about the cards
    public function displayCards(): string{
        $output = "<div>";
        $output .= $this->name . " cards: ";
        foreach($this->playerCards as $card){
            $output .= "<p>";
            $output .= $card->name . " of ";
            $output .= $card->suit;
            $output .= ": " . $card->score;
            $output .= "</p>";
        }
        $output .= "</div>";
        return $output;
    }

    public function scoreOfCardsInHand():int {
        $totalScore = 0;
        foreach($this->playerCards as $card){
            $totalScore += $card->score;
        }
        return $totalScore;
    }

    public function playerHasAceScoreOverTwentyOne(){

    }
}