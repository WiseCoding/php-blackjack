<?php

declare(strict_types=1);

class Player
{
  private $cards = [];
  private $lost = false;

  public function __construct($deck, $player)
  {
    array_push($this->cards, $deck->drawCard());
    array_push($this->cards, $deck->drawCard());
    saveStartCards($this->cards, $player);
  }

  public function draw()
  {
    // array_push($this->cards, $deck->drawCard());
    // saveDrawnCard($this->cards, $player);
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
