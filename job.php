<?php

require('src/model.php');

if(isset($_GET['id']) && $_GET['id'] > 0) {
    $identifier = $_GET['id'];
}
else {
    echo "Erreur";
    die;
}

$job = getJob($identifier);

require('templates/job.php');