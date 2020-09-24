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
      //echo "ONE";
    } else if ($playerScore > $dealerScore && $playerScore <= 21) {
      $this->dealer->stop();
      //echo "TWO";
    } else if ($playerScore < $dealerScore && $dealerScore <= 21) {
      $this->player->stop();
      //echo "THREE";
    } else if ($playerScore <= 21) {
      $this->dealer->stop();
      //echo "FOUR";
    } else if ($dealerScore <= 21) {
      $this->player->stop();
      //echo "FIVE";
    } else if ($dealerScore > 21) {
      $this->dealer->stop();
      //echo "SIX";
    } else if ($playerScore > 21) {
      $this->player->stop();
      //echo "SEVEN";
    } else if ($playerScore > 21 && $dealerScore > 21) {
      $this->player->stop();
      $this->dealer->stop();
      //echo "EIGHT";
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
    } else if ($dealerScore === 21) {
      $this->player->stop();
      $this->setState('game_over');
    }
  }
}
