<?php

    require_once '../Modeli/baza.php';

    if(!isset($_GET['pretraga']) || empty($_GET['pretraga']))
    {
        die("Niste uneli model za pretragu!");
    }



    $pretraga = $_GET['pretraga'];

    $rezultat = $baza->query("SELECT * FROM proizvodi WHERE ime_proizvoda LIKE '%$pretraga%' OR opis LIKE '%$pretraga%'");

    if($rezultat->num_rows >= 1)
    {
        echo "Pronadjeno je $rezultat->num_rows proizvoda koji se poklapaju sa Vasom pretragom!";
    }

    else
    {
        echo "Nije pronadjen nijedan proizvod!";
    }


    $proizvodi = $baza->query("SELECT * FROM proizvodi WHERE ime_proizvoda LIKE '%$pretraga%' OR opis LIKE '%$pretraga%'");
    ?>


<!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Document</title>
    </head>
    <body>
    <?php foreach($proizvodi as $proizvod): ?>
        <div>
            <h1>Ime proizvoda: <?= $proizvod['ime_proizvoda'] ?></h1>
            <p>Opis proizvoda: <?= $proizvod['opis'] ?></p>
            <p>Cena proizvoda: <?= $proizvod['cena'] ?> </p>
            <p>Na stanju: <?= $proizvod['kolicina'] ?></p>
        </div>

    <?php endforeach; ?>

</body>
</html>




