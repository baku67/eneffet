
<?php

    session_start();
    require('src/model.php');


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            switch($_POST['type']){
                case "filterJobList":

                    $data = [
                        "category" => $_POST["searchFilter1"],
                        "locality" => $_POST["searchFilter2"]
                    ];

                    $filter1 = $_POST["searchFilter1"];
                    $filter2 = $_POST["searchFilter2"];
                    if (empty($_POST["searchFilter1"])){
                        $filter1 = "Toutes catégories";
                    }
                    else if (empty($_POST["searchFilter2"])) {
                        $filter2 = "Tout Lieu";
                    }
                    $filters = [$filter1, $filter2];
                    $jobsFiltered = getJobsFiltered($data);
                    break;
            }
    }

    // require("../templates/search.php");
    require("templates/homepage.php");