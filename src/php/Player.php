<?php

declare(strict_types=1);

class Player
{
  protected $cards = [];
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

  public function draw(Deck $deck)
  {
    // if total > 21 player loses
    if ($this->calcScore() > 21) {
      $this->lost = true;
      return 'Bust!';
    } else {
      $drawnCard = $deck->drawCard();
      array_push($this->cards, $drawnCard);
      if ($this->calcScore() > 21) {
        $this->lost = true;
        return 'Bust!';
      }
      return 'Drawn Card';
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

  public function hold(): void
  {
    if ($this->lost === true) {
      # code...
    }
  }

  public function stop(): void
  {
    $this->lost = true;
  }

  public function hasLost(): bool
  {
    return $this->lost;
  }
}

class Dealer extends Player
{
  public function __construct(Deck $deck)
  {
    array_push($this->cards, $deck->drawCard());
    array_push($this->cards, $deck->drawCard());
  }

  public function draw(Deck $deck)
  {
    // dealer stops drawing cards if total > 15
    if ($this->calcScore() <= 15) {
      parent::draw($deck);
      return "Hold";
    }
  }
}
