<?php

declare(strict_types=1);

class Player
{
  private $card = [];
  private $lost = false;

  public function __construct(array $card)
  {
    // TODO: Draw 2 cards for the player
    //$this->card = $card;
  }

  public function hit()
  {
    # code...
  }
  public function surrender()
  {
    # code...
  }
  public function getScore()
  {
    # code...
  }
  public function hasLost()
  {
    # code...
  }
}

// The player has to draw to cards.
// The player has to get two cards from the Deck.

// Then the dealer has to get two cards from the deck.