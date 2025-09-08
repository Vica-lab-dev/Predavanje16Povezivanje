<?php

    require_once "../Modeli/baza.php";

    if(!isset($_GET["LoginEmail"]) || empty($_GET["LoginEmail"]))
    {
        die("Niste uneli Vas email!");
    }

    if(!isset($_GET["LoginSifra"]) || empty($_GET["LoginSifra"]))
    {
        die("Niste uneli Vasu lozinku!");
    }

    $email = $_GET["LoginEmail"];
    $sifra = $_GET["LoginSifra"];

    $rezultat = $baza->query("SELECT * FROM korisnici WHERE email = '$email'");

    if($rezultat->num_rows >= 1)
    {
        $korisnik = $rezultat->fetch_assoc();

        $proveraSifre = password_verify($sifra, $korisnik["sifra"]);

        if($proveraSifre == true)
        {
            echo "Uspesno ste se ulogovali!";
        }

        else
        {
            echo "Lozinke se ne poklapaju!";
        }

    }

    else
    {
        echo "Korisnik ne postoji u bazi podataka";
    }
