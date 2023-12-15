<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galgje</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body class="kleur bg-info">

    <?php
    $woordenlijst = ['appel', 'banaan', 'citroen', 'druif', 'kiwi', 'mango', 'perzik'];

    $woord = $woordenlijst[array_rand($woordenlijst)];

    $geradenLetters = []; 

    function tekenGalg($fouten) {
        $galg[0] = <<<ABC
        +---+
        |   | 
            |
            |
            |     
            |
            |
       =======
       ABC;
       $galg[1] = <<<ABC
        +---+
        |   | 
        o   |
            |
            |     
            |
            |
       =======
       ABC;
       $galg[2] = <<<ABC
        +---+
        |   | 
        o   |
        |   |
            |     
            |
            |
       =======
       ABC;
       $galg[3] = <<<ABC
        +---+
        |   | 
        o   |
       /|   |
            |     
            |
            |
       =======
       ABC;
       $galg[4] = <<<ABC
        +---+
        |   | 
        o   |
       /|\  |
            |     
            |
            |
       =======
       ABC;
       $galg[5] = <<<ABC
        +---+
        |   | 
        o   |
       /|\  |
       / \  |     
            |
            |
       =======
       ABC;
       $galg[6] = <<<ABC
        +---+
        |   | 
        o   |
       /|\  |
       / \  |     
            |
            |
       =======
       ABC;
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

    function weergaveAlfabet($geradenLetters) {
        $alfabet = range('A', 'Z');
        $output = '';

        foreach ($alfabet as $letter) {
            if (in_array($letter, $geradenLetters)) {
                $output .= '<button class="btn btn-success mx-1" disabled>' . $letter . '</button>';
            } else {
                $output .= '<button class="btn btn-light mx-1" onclick="raadLetter(\'' . $letter . '\')">' . $letter . '</button>';
            }
        }

        return $output;
    }

    if(isset($_GET['name'])) {
        $name = $_GET['name'];
        echo $name;
    }

    if(isset($_GET['letter'])) {
        $letter = $_GET['letter'];
        if(strpos($woord, $letter) !== false) {
            $geradenLetters[] = $letter;
        }
    }
    ?>
    <div class="d-flex w-100">
        <div class="alfabet mx-auto">
            <?php
            //  woord weergave
            echo weergaveWoord($woord, $geradenLetters);

            //  Weergave alfabet
            echo weergaveAlfabet($geradenLetters);
            ?>
        </div>
    </div>

</body>
</html>