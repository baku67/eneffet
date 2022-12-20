<?php
    session_start();

    require_once 'helpers/session_helper.php';
    require('src/account.php');

    function saveCv(){

    }


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        switch($_POST['type']){
            case "saveCv":

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'user_Id' => $_SESSION['usersId'],
                    'cv_first_name' => $_POST['cv_first_name']
                ];

                saveCvModel($data);
                break;
            }
    }




    if(isset($_SESSION['usersId'])) {
        $identifier = $_SESSION['usersId'];
    }
    else {
        echo "Erreur";
        die;
    }
    $cv = getCv($identifier);


    require('templates/account.php');


