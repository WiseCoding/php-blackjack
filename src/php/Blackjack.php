<?php

declare(strict_types=1);

class Blackjack
{
  private $player, $dealer, $deck, $state;

  // CONSTRUCTOR
  public function __construct()
  {
    $this->deck = new Deck();
    $this->deck->shuffle();
    $this->player = new Player($this->deck);
    $this->dealer = new Dealer($this->deck);
  }

  // GETTERS
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

  // METHODS
  public function evalGame()
  {
    $playerScore = $this->player->calcScore();
    $dealerScore = $this->dealer->calcScore();

    if ($playerScore === $dealerScore) {
      $this->player->stop();
      $this->dealer->stop();
    } else if ($playerScore > $dealerScore) {
      $this->dealer->stop();
    } else {
      $this->player->stop();
    }
  }

  public function blackJack()
  {
    $playerScore = $this->player->calcScore();
    $dealerScore = $this->dealer->calcScore();

    if ($playerScore === 21 && $dealerScore === 21) {
      $this->player->stop();
      $this->dealer->stop();
    } else if ($playerScore === 21) {
      $this->dealer->stop();
    } else if (($dealerScore === 21)) {
      $this->player->stop();
    }
  }
}
