<?php
    if(!isset($_GET["id"]) || empty($_GET["id"]))
    {
        die("Fali ID proizvoda");
    }

    require_once "baza.php";

    $idProizvoda = $_GET["id"];

    $rezultat = $baza->query("SELECT * FROM proizvodi WHERE id = $idProizvoda");

    if($rezultat->num_rows == 0)
    {
        die("Ovaj proizvod ne postoji.");
    }

    $proizvod = $rezultat->fetch_assoc();

?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <h1><?= $proizvod['ime_proizvoda']?></h1>
        <p><?= $proizvod['opis'] ?></p>
        <p><?= $proizvod['cena'] ?></p>

        <?php if($proizvod['kolicina'] >= 1): ?>

            <p>Ima na stanju</p>

        <?php else: ?>
            <p>Nema na stanju</p>

        <?php endif; ?>
    </body>
</html>
