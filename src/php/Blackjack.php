<?php

declare(strict_types=1);

class Blackjack
{
  private $player, $dealer, $deck;

  public function __construct()
  {
    $this->deck = new Deck();
    $this->deck->shuffle();
    $this->player = new Player($this->getDeck());
    $this->dealer = new Player($this->getDeck());
  }

  public function getPlayer(): Player
  {
    return $this->player;
  }

  public function getDealer(): Player
  {
    return $this->dealer;
  }
  public function getDeck(): Deck
  {
    return $this->deck;
  }
}
