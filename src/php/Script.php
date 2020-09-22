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

function saveCardsSession($cards, $player)
{
  if (!isset($_SESSION[$player])) {
    $_SESSION[$player] = $cards;
  }
}

function printCards($player)
{
  if (isset($_SESSION[$player])) {
    $cards = $_SESSION[$player];
    foreach ($cards as $card) {
      echo '<br/>';
    }
  }
}
