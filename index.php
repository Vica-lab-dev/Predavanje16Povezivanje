<?php

require_once "baza.php";
$rezultat = $baza->query("SELECT * FROM proizvodi");

$proizvodi = $rezultat->fetch_all(MYSQLI_ASSOC);

//array(6) {
//[0]=> array(6) { ["id"]=> string(1) "1" ["ime_proizvoda"]=> string(9) "iPhone 13" ["opis"]=> string(12) "Dobar iphone" ["cena"]=> string(7) "1199.99" ["slika"]=> string(12) "iPhone13.jpg" ["kolicina"]=> string(2) "55" }
//[1]=> array(6) { ["id"]=> string(1) "2" ["ime_proizvoda"]=> string(9) "iPhone 11" ["opis"]=> string(7) "Kao nov" ["cena"]=> string(6) "989.99" ["slika"]=> string(12) "iPhone11.jpg" ["kolicina"]=> string(2) "22" }
//[2]=> array(6) { ["id"]=> string(1) "3" ["ime_proizvoda"]=> string(9) "iPhone 15" ["opis"]=> string(17) "100% pravi iPhone" ["cena"]=> string(7) "2499.99" ["slika"]=> string(15) "nepostojeci.jpg" ["kolicina"]=> string(1) "1" }
//[3]=> array(6) { ["id"]=> string(1) "4" ["ime_proizvoda"]=> string(16) "iPhone 14 ProMax" ["opis"]=> string(23) "Ukraden nov iz Austrije" ["cena"]=> string(7) "1999.99" ["slika"]=> string(12) "iPhone14.jpg" ["kolicina"]=> string(2) "66" }
//[4]=> array(6) { ["id"]=> string(1) "5" ["ime_proizvoda"]=> string(6) "Jabuka" ["opis"]=> string(13) "Crvena Jabuka" ["cena"]=> string(5) "99.00" ["slika"]=> string(10) "jabuka.jpg" ["kolicina"]=> string(2) "40" }
//[5]=> array(6) { ["id"]=> string(1) "6" ["ime_proizvoda"]=> string(6) "Gitara" ["opis"]=> string(17) "Elektricna gitara" ["cena"]=> string(7) "1000.00" ["slika"]=> string(10) "gitara.jpg" ["kolicina"]=> string(2) "54" } }




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
    <?php foreach ($proizvodi as $proizvod): ?>
        <div>
            <h1><?= $proizvod['ime_proizvoda'] ?></h1>
            <p><?= $proizvod['opis'] ?></p>
            <p>Cena proizvoda:<?= $proizvod['cena'] ?></p>
            <p>Na stanju: <?= $proizvod['kolicina'] ?></p>
            <?php if($proizvod['kolicina'] >= 1): ?>

                <p>Ima na stanju</p>

            <?php else: ?>
                <p>Nema na stanju</p>

            <?php endif; ?>

            <a href="proizvod.php?id=<?= $proizvod['id'] ?>">Pogledaj proizvod</a>

        </div>
    <?php endforeach; ?>

    </body>
</html>
