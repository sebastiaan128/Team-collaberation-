<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['1-player'])) {
        header('Location: random.php '); 
        exit;
    } elseif (isset($_POST['2-players'])) {
        header('Location: zelfgekozen.php'); 
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galgje</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script></head>

    </head>
    <body class="bg-info">
    <h1 class="text-center">Galgje</h1>

    <div class="woord row d-flex  text-center ">
        <p> Om de beurt raden de spelers een letter. Wanneer de letter niet in het woord voorkomt, zal er een stukje van de 10-delige galg opgebouwd worden. De spelbeurt kan ook gebruikt worden om het juiste woord te raden. Indien dit onjuist was, zal er wederom een stukje van de galg opgebouwd worden.</p>
        <p class="mt-2">Met hoeveel mensen wil je het spel spelen?</p>
    </div>
    <div class="button rounded d-flex justify-content-center align-items-center py-1">
        
    <form method="post">
            <button type="submit" name="1-player" class="rounded btn btn-light">1 player</button>
        </form>
        <div class="button1 d-flex px-3">
            <form method="post">
            
                <button type="submit" name="2-players" class="rounded btn btn-light ">2 players</button>
            </form>
        </div>

    </div>
    </body>
    </html>
