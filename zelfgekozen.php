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
    <form action="zelfgekozen.php" method="get">   
        <div class="d-flex justify-content-center align-items-center py-1">
            <input type="password" class="mx-2 py-1 rounded" name="name" id="input" placeholder="Voer hier je woord in">
            <button type="submit" class="rounded btn btn-light">Speel</button> 
        </div>
    </form>
    <div class="d-flex w-100">

    
<div class="alfabet mx-auto">
<?php
if(isset($_GET['name'])) {
    $name = $_GET['name'];
    echo $name;
}

if(isset($_GET['letter'])) {
    $letter = $_GET['letter'];
    if(strpos($name, $letter) !== false) {
        echo "The letter '$letter' is present in the name.";
    }
}
  
    $letters = range('A', 'Z');
    foreach ($letters as $letter) {
        echo '<button type="submit" name="letter" value="' . $letter . '" class="rounded btn btn-light mx-1">' . $letter . '</button>';
    }
    ?>
    </div>
    </div>
</body>
</html>