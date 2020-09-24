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
require 'src/php/Script.php';

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

// CHECK FOR BLACKJACK
$blackjack->blackJack();

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
    $blackjack->evalGame();
    // save session
    $_SESSION['blackjack'] = serialize($blackjack);
  }

  // PLAYER SURRENDERS
  if (isset($_POST['stop'])) {
    $blackjack->getPlayer()->stop();
    // save session
    $_SESSION['blackjack'] = serialize($blackjack);
  }
}

// PRINT STATUS MESSAGE
$player_lost = $blackjack->getPlayer()->hasLost();
$dealer_lost = $blackjack->getDealer()->hasLost();

if ($player_lost && $dealer_lost) {
  $status = 'It\'s a <b>draw</b>!';
  $playerDiv = "card bg-orange-200";
  $dealerDiv = "card bg-orange-200";
  $blackjack->setState('game_over');
}
if ($player_lost && $dealer_lost === false) {
  $status = 'You <b>Lose</b>!';
  $playerDiv = "card bg-red-200";
  $dealerDiv = "card bg-green-200";
  $blackjack->setState('game_over');
}
if ($player_lost === false && $dealer_lost) {
  $status = 'You <b>Win</b>!';
  $playerDiv = "card bg-green-200";
  $dealerDiv = "card bg-red-200";
  $blackjack->setState('game_over');
}
if ($player_lost === false && $dealer_lost === false) {
  $status = '<i>Game in progress...</i>';
  $playerDiv = "card bg-white";
  $dealerDiv = "card bg-white";
  $blackjack->setState('game_on');
}




// HTML LAST
require 'src/php/HTML.php';
//var_dump($blackjack);

//debug();






/* // REFRESH PREVENT
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $_SESSION['postdata'] = $_POST;
  unset($_POST);
  header("Location: " . $_SERVER['PHP_SELF']);
  exit;
} */