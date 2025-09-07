<?php

    $baza = mysqli_connect("localhost", "root", "", "web_shop");

    if (mysqli_connect_errno())
    {
        die("Problem sa konekcijom u bazu podataka");
    }