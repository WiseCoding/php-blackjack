<?php

declare(strict_types=1);

class Blackjack
{
  private $player, $dealer, $deck, $state = 'game_on';

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
  public function getState()
  {
    return $this->state;
  }

  // SETTERS
  public function setState($state)
  {
    $this->state = $state;
    return $this->state;
  }

  // METHODS
  public function evalGame()
  {
    $playerScore = $this->player->calcScore();
    $dealerScore = $this->dealer->calcScore();

    if ($playerScore === $dealerScore && $playerScore <= 21) {
      $this->player->stop();
      $this->dealer->stop();
    } else if ($playerScore > $dealerScore && $playerScore <= 21) {
      $this->dealer->stop();
    } else if ($playerScore < $dealerScore && $dealerScore <= 21) {
      $this->player->stop();
    } else if ($playerScore <= 21) {
      $this->dealer->stop();
    } else if ($dealerScore <= 21) {
      $this->player->stop();
    } else if ($dealerScore > 21) {
      $this->dealer->stop();
    } else if ($playerScore > 21) {
      $this->player->stop();
    } else if ($playerScore > 21 && $dealerScore > 21) {
      $this->player->stop();
      $this->dealer->stop();
    }
    $this->setState('game_over');
  }

  public function blackJack()
  {
    $playerScore = $this->player->calcScore();
    $dealerScore = $this->dealer->calcScore();

    if ($playerScore === 21 && $dealerScore === 21) {
      $this->player->stop();
      $this->dealer->stop();
      $this->setState('game_over');
    } else if ($playerScore === 21) {
      $this->dealer->stop();
      $this->setState('game_over');
      return "You got <b>blackjack!</b>";
    } else if ($dealerScore === 21) {
      $this->player->stop();
      $this->setState('game_over');
      return "Dealer got <b>blackjack!</b>";
    }
  }
}
