<?php

require_once "../Modeli/baza.php";
$rezultat = $baza->query("SELECT * FROM proizvodi");

$proizvodi = $rezultat->fetch_all(MYSQLI_ASSOC);





?>

<!doctype html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
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

                <a href="Permalink.php?id=<?= $proizvod['id'] ?>">Pogledaj proizvod</a>

            </div>
        <?php endforeach; ?>

        </body>
    </html>