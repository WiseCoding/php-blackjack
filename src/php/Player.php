<?php

declare(strict_types=1);

class Player
{
  private $cards = [];
  private $lost = false;


  public function __construct(Deck $deck)
  {
    array_push($this->cards, $deck->drawCard());
    array_push($this->cards, $deck->drawCard());
  }

  // GETTERS
  public function getCards(): array
  {
    return $this->cards;
  }

  // METHODS
  public function showCards(): void
  {
    // echo cards in unicode format
    foreach ($this->cards as $card) {
      echo $card->getUnicodeCharacter(true);
    }
  }

  public function draw(Deck $deck): void
  {
    // draw a new card from the deck
    $drawnCard = $deck->drawCard();
    array_push($this->cards, $drawnCard);

    // if total > 21 player loses
    if ($this->calcScore() > 21) {
      $this->lost = true;
    }
  }

  public function calcScore(): int
  {
    // calculate the total points of all cards
    $total = 0;
    foreach ($this->cards as $card) {
      $total += $card->getValue();
    }
    return $total;
  }

  public function hold()
  {
    # code...
  }

  public function stop()
  {
    $this->lost = true;
  }

  public function hasLost()
  {
    # code...
  }
}
