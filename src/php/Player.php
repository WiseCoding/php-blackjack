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
    foreach ($this->cards as $card) {
      echo $card->getUnicodeCharacter(true);
    }
  }

  public function draw(Deck $deck): void
  {
    $drawnCard = $deck->drawCard();
    array_push($this->cards, $drawnCard);
  }

  public function calcTotal()
  {
    # code...
  }




  public function hold()
  {
    # code...
  }
  public function stop()
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
