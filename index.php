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

/* foreach ($deck->getCards() as $card) {
  echo $card->getUnicodeCharacter(true);
} */
echo '<br>';

$blackjack = new Blackjack();
$test = $_SESSION['player'][0];
echo $test->getUnicodeCharacter(true);

require 'src/php/HTML.php'; // HTML LAST