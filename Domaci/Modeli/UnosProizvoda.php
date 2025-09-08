<?php

    require_once '../Modeli/baza.php';

    if(!isset($_POST['ime_proizvoda']) || empty($_POST['ime_proizvoda']))
    {
        die("Ime proizvoda nije uneto!");
    }

    if(!isset($_POST['opis']) || empty($_POST['opis']))
    {
        die("Opis nije unet!");
    }

    if(!isset($_POST['cena']) || empty($_POST['cena']))
    {
        die("Cena nije uneta!");
    }

    if(!isset($_POST['slika']) || empty($_POST['slika']))
    {
        die("Slika nije uneta!");
    }

    if(!isset($_POST['kolicina']) || empty($_POST['kolicina']))
    {
        die("Kolicina nije uneta!");
    }

    $ime_proizvoda = $_POST['ime_proizvoda'];
    $opis_proizvoda = $_POST['opis'];
    $cena = $_POST['cena'];
    $slika = $_POST['slika'];
    $kolicina = $_POST['kolicina'];

    $rezultat = $baza->query("SELECT * FROM proizvodi WHERE ime_proizvoda = '$ime_proizvoda'");

    if($rezultat->num_rows >= 1)
    {
        echo "Proizvod postoji u bazi podataka";
    }

    else
    {
        $baza->query("INSERT INTO proizvodi (ime_proizvoda, opis, cena, slika, kolicina) 
        VALUES ('$ime_proizvoda', '$opis_proizvoda', '$cena', '$slika', $kolicina )");
        echo "Uspesno dodat proizvod u bazu podataka!";
    }

?>


