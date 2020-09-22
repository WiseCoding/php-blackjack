<?php

declare(strict_types=1);

class Blackjack
{
  private $player, $dealer, $deck;

  public function __construct()
  {
    $deck = new Deck();
    $deck->shuffle();
    $player = new Player($deck, 'player');
    $dealer = new Player($deck, 'dealer');

    $this->player = $player;
    $this->dealer = $dealer;
  }

  public function getPlayer()
  {
    return $this->player;
  }

  public function getDealer()
  {
    return $this->dealer;
  }
}
