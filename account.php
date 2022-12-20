<?php

    session_start();

    require('src/account.php');

    if(isset($_SESSION['usersId'])) {
        $identifier = $_SESSION['usersId'];
    }
    else {
        echo "Erreur";
        die;
    }
    $cv = getCv($identifier);


    require('templates/account.php');


