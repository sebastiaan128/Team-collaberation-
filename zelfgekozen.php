<?php

session_start();

$woord = $_SESSION['woord'] ?? '';
$geradenLetters = $_SESSION['geradenLetters'] ?? [];
$incorrectGuesses = $_SESSION['incorrectGuesses'] ?? 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
    $woord = strtoupper($_POST['name']);
    $_SESSION['woord'] = $woord;
    $_SESSION['geradenLetters'] = [];
    $_SESSION['incorrectGuesses'] = 0;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['letter'])) {
        $letter = $_POST['letter'];
        $geradenLetters[] = $letter;
        if (!in_array($letter, str_split($woord))) {
            $incorrectGuesses++;
        }
        $_SESSION['geradenLetters'] = $geradenLetters;
        $_SESSION['incorrectGuesses'] = $incorrectGuesses;
    } elseif (isset($_POST['guess'])) {
        $guess = strtoupper($_POST['guess']);
        if ($guess === $woord) {
            echo '<h2 class="text-center text-success">Goed gedaan !.</h2>';
            $woord = '';
            $_SESSION['woord'] = '';
            $_SESSION['geradenLetters'] = [];
            $_SESSION['incorrectGuesses'] = 0;
        } else {
            $incorrectGuesses = 6; 
            $_SESSION['incorrectGuesses'] = $incorrectGuesses;
        }
    } elseif (isset($_POST['reset'])) {
        $woord = '';
        $_SESSION['woord'] = '';
        $_SESSION['geradenLetters'] = [];
        $_SESSION['incorrectGuesses'] = 0;
    }
}

function tekenGalg($incorrectGuesses) {
    $galg = [
        '<pre>
        +---+
        |   | 
            |
            |
            |     
            |
            |
       =======</pre>',
       '<pre>
        +---+
        |   | 
        o   |
            |
            |     
            |
            |
       =======</pre>',
       '<pre>
        +---+
        |   | 
        o   |
        |   |
            |     
            |
            |
       =======</pre>',
       '<pre>
        +---+
        |   | 
        o   |
       /|   |
            |     
            |
            |
       =======</pre>',
       '<pre>
        +---+
        |   | 
        o   |
       /|\  |
            |     
            |
            |
       =======</pre>',
       '<pre>
        +---+
        |   | 
        o   |
       /|\  |
       /    |     
            |
            |
       =======</pre>',
       '<pre>
        +---+
        |   | 
        o   |
       /|\  |
       / \  |     
            |
            |
       =======</pre>'
    ];

    return $galg[$incorrectGuesses];
}

function weergaveWoord($woord, $geradenLetters) {
    $output = '';

    foreach (str_split($woord) as $letter) {
        if (in_array($letter, $geradenLetters)) {
            $output .= $letter . ' ';
        } else {
            $output .= '_ ';
        }
    }

    return $output;
}

function weergaveAlfabet($geradenLetters, $woord) {
    $alfabet = range('A', 'Z');
    $output = '';

    foreach ($alfabet as $letter) {
        if (in_array($letter, $geradenLetters)) {
            if (in_array($letter, str_split($woord))) {
                $output .= '<button class="btn btn-success mx-1" disabled>' . $letter . '</button>';
            } else {
                $output .= '<button class="btn btn-danger mx-1" disabled>' . $letter . '</button>';
            }
        } else {
            $output .= '<form method="post" class="d-inline-block"><input type="hidden" name="letter" value="' . $letter . '"><button type="submit" class="btn btn-light mx-1">' . $letter . '</button></form>';
        }
    }

    return $output;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galgje - Two Player</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-info">

<h1 class="text-center">Galgje - Two Player</h1>

<div class="d-flex w-100 justify-content-center mt-4">
    <?php 
        if ($incorrectGuesses >= 6) {
            echo '<h2 class="text-center text-danger">YOU LOST, LOSER!</h2>';
        } else {
            echo tekenGalg($incorrectGuesses); 
        }
    ?>
</div>

<div class="d-flex w-100">
    <div class="woord mx-auto my-4">
        <h3 class="text-center"><?php echo weergaveWoord($woord, $geradenLetters); ?></h3>
    </div>
</div>

<div class="d-flex w-100">
    <div class="alfabet mx-auto">
        <?php echo weergaveAlfabet($geradenLetters, $woord); ?>
    </div>
</div>

<?php if (empty($woord)): ?>
<div class="d-flex w-100 justify-content-center mt-4">
    <form action="" method="post">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="name" placeholder="Enter the word">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
</div>
<?php endif; ?>

<form method="post" class="text-center mt-4">
    <button type="submit" name="reset" class="btn btn-danger">Reset Game</button>
</form>

</body>
</html>
