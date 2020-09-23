<?php

declare(strict_types=1);

// START SESSION
session_start();

// REQUIRES
require 'src/php/Suit.php';
require 'src/php/Card.php';
require 'src/php/Deck.php';
require 'src/php/Player.php';
require 'src/php/Blackjack.php';
require 'src/php/Script.php';

// DEBUG
debug();
//session_unset();


// INSTANTIATION
if (!isset($_SESSION['blackjack'])) {
  $blackjack = new Blackjack();
  $_SESSION['blackjack'] = serialize($blackjack);
} else {
  $blackjack = unserialize($_SESSION['blackjack']);
}

// PLAYER DRAWS CARD
if (isset($_POST['draw'])) {
  $blackjack->getPlayer()->draw($blackjack->getDeck());
  $_SESSION['blackjack'] = serialize($blackjack);
}

// PLAYER HOLDS


// PLAYER SURRENDERS



// HTML LAST
require 'src/php/HTML.php';
