
<?php

    session_start();
    require('../src/model.php');


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            switch($_POST['type']){
                case "filterJobList":
                    $data = [
                        "category" => $_POST["searchFilter1"],
                        "locality" => $_POST["searchFilter2"]
                    ];

                    $jobsFiltered = getJobsFiltered($data);
                    break;
            }
    }

    // require("../templates/search.php");
    require("../templates/homepage.php");