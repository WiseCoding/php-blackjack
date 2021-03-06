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
    } else {
      $drawnCard = $deck->drawCard();
      array_push($this->cards, $drawnCard);
      if ($this->calcScore() > 21) {
        $this->lost = true;
      }
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
    }
  }

  public function showCard($amount)
  {
    // echo one card & one unicode card back to hide cards
    echo $this->cards[0]->getUnicodeCharacter(true);
    for ($i = 1; $i < $amount; $i++) {
      echo '<span class="sm:text-9xl md:text-10xl text-8xl">&#127136</span>';
    }
  }
}
