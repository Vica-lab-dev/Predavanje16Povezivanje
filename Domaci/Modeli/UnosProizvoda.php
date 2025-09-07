<?php

    require_once '../Modeli/baza.php';

    if(!isset($_GET['ime_proizvoda']) || empty($_GET['ime_proizvoda']))
    {
        die("Ime proizvoda nije uneto!");
    }

    if(!isset($_GET['opis']) || empty($_GET['opis']))
    {
        die("Opis nije unet!");
    }

    if(!isset($_GET['cena']) || empty($_GET['cena']))
    {
        die("Cena nije uneta!");
    }

    if(!isset($_GET['slika']) || empty($_GET['slika']))
    {
        die("Slika nije uneta!");
    }

    if(!isset($_GET['kolicina']) || empty($_GET['kolicina']))
    {
        die("Kolicina nije uneta!");
    }

    $ime_proizvoda = $_GET['ime_proizvoda'];
    $opis_proizvoda = $_GET['opis'];
    $cena = $_GET['cena'];
    $slika = $_GET['slika'];
    $kolicina = $_GET['kolicina'];

    $rezultat = $baza->query("SELECT * FROM proizvodi WHERE ime_proizvoda = '$ime_proizvoda'");

    if($rezultat->num_rows >= 1)
    {
        echo "Proizvod postoji u bazi podataka";
    }

    else
    {
        $baza->query("INSERT INTO proizvodi (ime_proizvoda, opis, cena, slika, kolicina) 
        VALUES ('$ime_proizvoda', '$opis_proizvoda', $cena, '$slika', $kolicina )");
    }
