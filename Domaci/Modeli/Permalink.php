<?php

    require_once '../Modeli/baza.php';

    if(!isset($_GET["id"]) || empty($_GET["id"]))
    {
        die("Ne postoji ID proizvoda!");
    }

    $idProizvoda = $_GET["id"];

    $rezultat = $baza->query("SELECT * FROM proizvodi WHERE id = '$idProizvoda'");

    if($rezultat->num_rows == 0)
    {
        die("Ovaj proizvod ne postoji!");
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
            <h1>Ime proizvoda:<?= $proizvod['ime_proizvoda'] ?></h1>
            <p>Opis: <?= $proizvod['opis'] ?></p>
            <p>Cena proizvoda: <?= $proizvod['cena'] ?></p>
            <p>Na stanju: <?= $proizvod['kolicina'] ?></p>
        </body>
    </html>
