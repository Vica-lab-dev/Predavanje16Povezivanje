<?php

    $baza = mysqli_connect("localhost", "root", "", "web_shop");

    if(mysqli_connect_errno())
    {
        echo "Imamo problem sa konektovanjem na bazu";
    }