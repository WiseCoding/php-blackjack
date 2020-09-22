<?php

declare(strict_types=1);

class Player
{
  private $cards = [];
  private $lost = false;

  public function __construct($deck, $player)
  {
    $card1 = $deck->drawCard();
    $card2 = $deck->drawCard();
    $cards = [$card1, $card2];
    saveCardsSession($cards, $player);
  }

  public function draw()
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
