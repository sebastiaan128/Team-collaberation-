<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galgje</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-info">

<?php

$mode = isset($_POST['mode']) ? $_POST['mode'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($mode === 'single') {
        header('Location: random.php'); 
        exit;
    } elseif ($mode === 'two') {
        header('Location: zelfgekozen.php'); 
        exit;
    }
}

?>

<h1 class="text-center">Galgje</h1>

<div class="woord row d-flex text-center">
    <p> Om de beurt raden de spelers een letter. Wanneer de letter niet in het woord voorkomt, zal er een stukje van de 10-delige galg opgebouwd worden. De spelbeurt kan ook gebruikt worden om het juiste woord te raden. Indien dit onjuist was, zal er wederom een stukje van de galg opgebouwd worden.</p>
    <p class="mt-2">Met hoeveel mensen wil je het spel spelen?</p>
</div>

<div class="button rounded d-flex justify-content-center align-items-center py-1">
    <form method="post">
        <input type="hidden" name="mode" value="single">
        <button type="submit" class="rounded btn btn-light">1 player</button>
    </form>
    <div class="button1 d-flex px-3">
        <form method="post">
            <input type="hidden" name="mode" value="two">
            <button type="submit" class="rounded btn btn-light">2 players</button>
        </form>
    </div>
</div>

</body>
</html>
