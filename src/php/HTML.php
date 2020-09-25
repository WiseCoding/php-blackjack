<!DOCTYPE html>

<html lang="en-US">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Blackjack</title>

  <!--no favicon-->
  <link rel="stylesheet" type="text/css" href="./src/css/index.css" />
</head>

<body class="box-border bg-gray-100">

  <!-- FORM   -->
  <form class="container mx-auto" action="" method="POST">

    <!-- STATUS -->
    <div class="p-4 mt-6 text-xl text-center text-gray-800 rounded-full"><?= $status ?></div>

    <!-- BUTTONS -->
    <div class="flex flex-row flex-wrap justify-center p-6 mb-6">
      <button class="btn" value="play" name="play">
        <img class="sm:inline hidden w-8 h-8 mr-1" src="./src/img/restart.svg">
        <span>Play</span>
      </button>

      <button class="btn" value="draw" name="draw">
        <img class="sm:inline hidden w-8 h-8 mr-1" src="./src/img/draw.svg">
        <span>Draw</span>
      </button>

      <button class="btn" value="hold" name="hold">
        <img class="sm:inline hidden w-8 h-8 mr-1" src="./src/img/stand.svg">
        <span>Hold</span>
      </button>

      <button class="btn" value="stop" name="stop">
        <img class="sm:inline hidden w-8 h-8 mr-1" src="./src/img/stop.svg">
        <span>Stop</span>
      </button>
    </div>

    <!-- PLAYER -->
    <div class="card <?= $playerDiv ?> max-w-sm sm:max-w-xl md:max-w-2xl">
      <div class="mt-4 font-mono text-xl font-bold text-gray-800 transform translate-y-4">Player <?= $blackjack->getPlayer()->calcScore() ?></div>
      <div class="transform -translate-y-6"><?= $blackjack->getPlayer()->showCards(); ?></div>
    </div>

    <!-- DEALER -->
    <div class="card <?= $dealerDiv ?> max-w-sm sm:max-w-xl md:max-w-2xl">
      <div class="mt-4 font-mono text-xl font-bold text-gray-800 transform translate-y-4">Dealer <?= $blackjack->getDealer()->calcScore() ?></div>
      <div class="transform -translate-y-6"><?= ($blackjack->getState() === 'game_on') ? $blackjack->getDealer()->showCard(count($blackjack->getDealer()->getCards())) : $blackjack->getDealer()->showCards(); ?></div>
    </div>

  </form>

</body>

</html>