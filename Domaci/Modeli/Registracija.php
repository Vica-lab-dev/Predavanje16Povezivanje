<?php

    require_once "../Modeli/baza.php";



    if(!isset($_POST["email"]) || empty($_POST["email"]))
    {
        die("Nije unet email!");
    }

    if(!isset($_POST["sifra"]) || empty($_POST["sifra"]))
    {
        die("Sifra nije uneta, unesite je!");
    }

    $email = $_POST["email"];
    $sifra = password_hash($_POST["sifra"], PASSWORD_BCRYPT);

    $rezultat = $baza->query("SELECT * FROM korisnici WHERE email = '$email'");

    if($rezultat->num_rows >= 1)
    {
        echo "Korisnik vec postoji u bazi podataka!";
    }

    else
    {
        $baza->query("INSERT INTO korisnici (email, sifra) VALUES ('$email', '$sifra')");
    }

