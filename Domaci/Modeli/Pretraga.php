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



