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
$blackjack = new Blackjack();

if (isset($_POST['draw'])) {
  $blackjack->getPlayer()->draw();
}

// HTML LAST
require 'src/php/HTML.php';
