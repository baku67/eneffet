<?php
    session_start();

    require_once 'helpers/session_helper.php';
    require('src/account.php');



    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        switch($_POST['type']){
            case "saveCv":
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                if($_POST['cv_driving_licence']=="Oui") {
                    $_POST['cv_driving_licence'] = 1;
                }
                else {
                    $_POST['cv_driving_licence'] = 0;
                }
                $data = [
                    'user_Id' => $_SESSION['usersId'],
                    'cv_first_name' => $_POST['cv_first_name'],
                    'cv_last_name' => $_POST['cv_last_name'],
                    'cv_tel' => $_POST['cv_tel'],
                    'cv_email' => $_POST['cv_email'],
                    'cv_driving_licence' => $_POST['cv_driving_licence'],
                    'cv_address' => $_POST['cv_address'],
                    'cv_age' => $_POST['cv_age']
                ];
                saveCvModel($data);
                break;
            
            case "addExpCv":
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'user_Id' => $_SESSION['usersId'],
                    'exp_begin_date' => $_POST['expBeginDate'],
                    'exp_end_date' => $_POST['expEndDate'],
                    'exp_title' => $_POST['expTitle'],
                    'exp_content' => $_POST['expContent']
                ];
                
                
                if(empty($data['exp_content']) || empty($data['exp_title']) || empty($data['exp_begin_date']) || empty($data['exp_end_date'])) {
                    flash("addExpCv", "Veuillez remplir tous les champs");
                    break;
                }

                addExpCv($data);
                break;

        }
    }

    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'delete') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $expId = $_GET['id'];
        
                deleteExp($expId);
            }
        }
    };


    

    




    if(isset($_SESSION['usersId'])) {
        $identifier = $_SESSION['usersId'];
    }
    else {
        echo "Erreur";
        die;
    }
    $cv = getCv($identifier);
    $exps = getExperiences($identifier);


    require('templates/account.php');


