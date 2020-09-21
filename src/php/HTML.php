<!DOCTYPE html>

<html lang="en-US">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Blackjack</title>

  <!--no favicon-->
  <link rel="stylesheet" type="text/css" href="./src/css/index.css" />
</head>

<body class="container box-border bg-gray-100">
  <form action="" method="POST">
    <div class="card">
      <div class="mt-4 text-xl font-bold">PLAYER</div>
      <img id="cards" class="w-full" src="src/img/cards/card-2-clubs.svg">
      <div class="flex justify-center px-6 pt-4 pb-2 mb-6">

        <button class="btn" value="draw" name="draw">
          <img class="w-8 h-8 mr-2" src="./src/img/draw.svg">
          <span>Draw</span>
        </button>
        <button class="btn" value="hold" name="hold">
          <img class="w-8 h-8 mr-2" src="./src/img/stand.svg">
          <span>Hold</span>
        </button>
        <button class="btn" value="stop" name="stop">
          <img class="w-8 h-8 mr-2" src="./src/img/stop.svg">
          <span>Stop</span>
        </button>
      </div>
    </div>


    <div class="card">
      <div class="mt-4 text-xl font-bold">DEALER</div>
      <img id="cards" class="w-full" src="src/img/cards/card-2-clubs.svg">
    </div>
  </form>

  <aside class=""></aside>
  <footer class=""></footer>
</body>

</html>