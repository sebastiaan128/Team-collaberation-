<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['random'])) {
        header('Location: ...'); 
        exit;
    } elseif (isset($_POST['enter'])) {
        header('Location: ...'); 
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script></head>
<body class="bg-primary">
    <h1 class="text-center">Galgje</h1>
    <div class="woord text-center mt-5">
        <p>Wil je zelf een woord kiezen of een random woord?</p>
    </div>
    <div class="button d-flex justify-content-center align-items-center py-1">
        <form method="post">
            <button type="submit" name="random">Random</button>
        </form>
        <div class="button1 d-flex px-1">
            <form method="post">
                <button type="submit" name="enter">Zelf kiezen</button>
            </form>
        </div>
    </div>
</body>
 </html> 
 
 
        <!-- d-flex justify-content-center align-items-center py-1">
        <input type="text" id="input" placeholder="Voer hier je woord in">
        <button type="button" onclick="checkWord()">Check</button>  -->
