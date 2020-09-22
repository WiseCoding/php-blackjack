<?php

declare(strict_types=1);

class Player
{
  private $cards = [];
  private $lost = false;

  public function __construct($deck, $name)
  {
    $card1 = $deck->drawCard();
    $card2 = $deck->drawCard();
    saveCardSession($card1, $name . '1');
    saveCardSession($card2, $name . '2');
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
