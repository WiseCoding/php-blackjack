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


require 'src/php/HTML.php'; // HTML LAST

debug();


echo '<br>';
echo '<br>';
echo '<br>';

/* foreach ($deck->getCards() as $card) {
  echo $card->getUnicodeCharacter(true);
} */

$blackjack = new Blackjack();
