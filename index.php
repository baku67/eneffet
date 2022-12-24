<?php
require('src/model.php');

$jobs = getJobs();
// $jobsFiltered = getJobs();

require('templates/homepage.php');