<?php
require('src/model.php');

// $jobs = getJobs();
$filters = ["Toutes catégories", "Tout lieu"];
$jobsFiltered = getJobs();

require('templates/homepage.php');