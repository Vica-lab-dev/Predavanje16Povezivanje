<?php

    require_once "../Modeli/baza.php";



    if(!isset($_GET["email"]) || empty($_GET["email"]))
    {
        die("Nije unet email!");
    }

    if(!isset($_GET["sifra"]) || empty($_GET["sifra"]))
    {
        die("Sifra nije uneta, unesite je!");
    }

    $email = $_GET["email"];
    $sifra = password_hash($_GET["sifra"], PASSWORD_BCRYPT);

    $rezultat = $baza->query("SELECT * FROM korisnici WHERE email = '$email'");

    if($rezultat->num_rows >= 1)
    {
        echo "Korisnik vec postoji u bazi podataka!";
    }

    else
    {
        $baza->query("INSERT INTO korisnici (email, sifra) VALUES ('$email', '$sifra')");
        echo "Uspesno ste se registrovali!";
    }

