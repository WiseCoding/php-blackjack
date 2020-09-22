<?php

declare(strict_types=1);


// FUNCTIONS
function debug()
{
  echo '<h2>$_GET</h2>';
  var_dump($_GET);
  echo '<h2>$_POST</h2>';
  var_dump($_POST);
  echo '<h2>$_COOKIE</h2>';
  var_dump($_COOKIE);
  echo '<h2>$_SESSION</h2>';
  var_dump($_SESSION);
}

function saveStartCards($cards, $player)
{
  // If there are no cards saved in session, save the 2 start cards
  if (!isset($_SESSION[$player])) {
    $_SESSION[$player] = serialize($cards);
  }
}

function saveDrawnCard($drawnCard, $player)
{
  $oldCards = unserialize($_SESSION[$player], ['allowed_classes' => true]);
  $newCards = array_push($oldCards, $drawnCard);
  $_SESSION[$player] = serialize($newCards);
}

function printCards($player)
{
  if (isset($_SESSION[$player])) {
    $cards = unserialize($_SESSION[$player], ['allowed_classes' => true]);
    foreach ($cards as $card) {
      echo $card->getUnicodeCharacter(true);
    }
  }
}
