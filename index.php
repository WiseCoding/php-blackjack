<?php

declare(strict_types=1);

// START SESSION
session_start();
//session_destroy();

// REQUIRES
require 'src/php/Suit.php';
require 'src/php/Card.php';
require 'src/php/Deck.php';
require 'src/php/Player.php';
require 'src/php/Blackjack.php';

// GLOBALS
$playerStatus = '';
$dealerStatus = '';

// START, RESTART GAME
if (isset($_POST['play'])) {
  // RESET
  unset($blackjack);
  session_unset();
}


// INSTANTIATE NEW-ONGOING GAME
if (!isset($_SESSION['blackjack'])) {
  $blackjack = new Blackjack();
  // save session
  $_SESSION['blackjack'] = serialize($blackjack);
} else {
  $blackjack = unserialize($_SESSION['blackjack']);
}

// CHECK FOR GAME STATE
$state = $blackjack->getState();


if ($blackjack->getState() === 'game_on') {

  // PLAYER HITS
  if (isset($_POST['draw'])) {
    $blackjack->getPlayer()->draw($blackjack->getDeck());
    $blackjack->getDealer()->draw($blackjack->getDeck());
    // save session
    $_SESSION['blackjack'] = serialize($blackjack);
  }

  // PLAYER STANDS
  if (isset($_POST['hold'])) {
    $blackjack->getDealer()->draw($blackjack->getDeck());
    $blackjack->getDealer()->draw($blackjack->getDeck());
    $blackjack->getDealer()->draw($blackjack->getDeck());
    // evaluate game state
    $blackjack->evalGame();
    // save session
    $_SESSION['blackjack'] = serialize($blackjack);
  }

  // PLAYER SURRENDERS
  if (isset($_POST['stop'])) {
    $blackjack->getPlayer()->stop();
    // evaluate game state
    $blackjack->evalGame();
    // save session
    $_SESSION['blackjack'] = serialize($blackjack);
  }
}

// CHECK FOR BLACKJACK
$blackjack_message = '';
$blackjack_message = $blackjack->blackJack();

// PRINT STATUS MESSAGE
$player_lost = $blackjack->getPlayer()->hasLost();
$dealer_lost = $blackjack->getDealer()->hasLost();

// DRAW
if ($player_lost && $dealer_lost) {
  $status = 'It\'s a <b>draw</b>!';
  $playerDiv = "bg-orange-200";
  $dealerDiv = "bg-orange-200";
  $blackjack->setState('game_over');
}
// LOSE
if ($player_lost && $dealer_lost === false) {
  $status = 'You <b>lose</b>! ' . $blackjack_message;
  $playerDiv = "bg-red-200 ";
  $dealerDiv = "bg-green-200 ";
  $blackjack->setState('game_over');
}
// WIN
if ($player_lost === false && $dealer_lost) {
  $status = 'You <b>win</b>! ' . $blackjack_message;
  $playerDiv = "bg-green-200 ";
  $dealerDiv = "bg-red-200 ";
  $blackjack->setState('game_over');
}
// GAME ONGOING...
if ($player_lost === false && $dealer_lost === false) {
  $status = '<i>Game in progress...</i>';
  $playerDiv = "bg-gray-100";
  $dealerDiv = "bg-gray-100";
  $blackjack->setState('game_on');
}

// HTML LAST
require 'src/php/HTML.php';
