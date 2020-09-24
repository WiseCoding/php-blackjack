<?php

declare(strict_types=1);

// START SESSION
session_start();
//session_unset();

// REQUIRES
require 'src/php/Suit.php';
require 'src/php/Card.php';
require 'src/php/Deck.php';
require 'src/php/Player.php';
require 'src/php/Blackjack.php';
require 'src/php/Script.php';

// GLOBALS
$playerStatus = '';
$dealerStatus = '';

if (isset($_POST['play'])) {
  // RESET
  unset($blackjack);
  session_unset();
}

// INSTANTIATION
if (!isset($_SESSION['blackjack'])) {
  $blackjack = new Blackjack();
  $_SESSION['blackjack'] = serialize($blackjack);
} else {
  $blackjack = unserialize($_SESSION['blackjack']);
}

// PLAYER DRAWS CARD
if (isset($_POST['draw'])) {
  $playerStatus = $blackjack->getPlayer()->draw($blackjack->getDeck());
  $dealerStatus = $blackjack->getDealer()->draw($blackjack->getDeck());

  $_SESSION['blackjack'] = serialize($blackjack);
}

// PLAYER HOLDS
if (isset($_POST['hold'])) {
  $playerStatus = 'Hold';
  $dealerStatus = $blackjack->getDealer()->draw($blackjack->getDeck());
  $playerScore = $blackjack->getPlayer()->calcScore();
  $dealerScore = $blackjack->getDealer()->calcScore();
  if ($playerScore > $dealerScore) {
    $blackjack->getDealer()->stop();
  } else if ($playerScore === $dealerScore) {
    $blackjack->getPlayer()->stop();
    $blackjack->getDealer()->stop();
  } else {
    $blackjack->getPlayer()->stop();
  }

  $_SESSION['blackjack'] = serialize($blackjack);
}

// PLAYER SURRENDERS
if (isset($_POST['stop'])) {
  $blackjack->getPlayer()->stop();
  $playerStatus = 'Surrendered 🏳';
  $dealerStatus = 'Win';
}

// STATUS
if ($blackjack->getPlayer()->hasLost() && $blackjack->getDealer()->hasLost()) {
  $status = 'Draw...';
  $playerDiv = "card bg-orange-300";
  $dealerDiv = "card bg-orange-300";
}
if ($blackjack->getPlayer()->hasLost() && $blackjack->getDealer()->hasLost() === false) {
  $status = 'Player Lost, try again!';
  $playerDiv = "card bg-red-300";
  $dealerDiv = "card bg-green-300";
}
if ($blackjack->getPlayer()->hasLost() === false && $blackjack->getDealer()->hasLost()) {
  $status = 'Player Wins!';
  $playerDiv = "card bg-green-300";
  $dealerDiv = "card bg-red-300";
}
if ($blackjack->getPlayer()->hasLost() === false && $blackjack->getDealer()->hasLost() === false) {
  $status = 'Game in progress...';
  $playerDiv = "card bg-white";
  $dealerDiv = "card bg-white";
}

/* // REFRESH PREVENT
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $_SESSION['postdata'] = $_POST;
  unset($_POST);
  header("Location: " . $_SERVER['PHP_SELF']);
  exit;
} */

// HTML LAST
require 'src/php/HTML.php';

//debug();