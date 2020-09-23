<?php

declare(strict_types=1);

// START SESSION
session_start();
//debug();
//session_unset();

// REQUIRES
require 'src/php/Suit.php';
require 'src/php/Card.php';
require 'src/php/Deck.php';
require 'src/php/Player.php';
require 'src/php/Blackjack.php';
require 'src/php/Script.php';

// GLOBALS
$status = '';

// INSTANTIATION
if (!isset($_SESSION['blackjack'])) {
  $blackjack = new Blackjack();
  $_SESSION['blackjack'] = serialize($blackjack);
  $status = "Let the game begin, good luck!";
} else {
  $blackjack = unserialize($_SESSION['blackjack']);
  $status = "Make a choice!";
}

// PLAYER DRAWS CARD
if (isset($_POST['draw'])) {
  $blackjack->getPlayer()->draw($blackjack->getDeck());
  $_SESSION['blackjack'] = serialize($blackjack);
  $status = 'Player drew a card...';
}

// PLAYER HOLDS
if (isset($_POST['hold'])) {
  $blackjack->getDealer()->draw($blackjack->getDeck());
  $_SESSION['blackjack'] = serialize($blackjack);
  $status = 'Player holds on to current hand.';
}

// PLAYER SURRENDERS
if (isset($_POST['stop'])) {
  $blackjack->getPlayer()->stop();
  $_SESSION['blackjack'] = serialize($blackjack);
  $status = 'Player surrenders. Well done dealer!';
}


// HTML LAST
require 'src/php/HTML.php';
