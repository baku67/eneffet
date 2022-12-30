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

            case "addTrainingCv":
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'user_Id' => $_SESSION['usersId'],
                    'training_begin_date' => $_POST['trainingBeginDate'],
                    'training_end_date' => $_POST['trainingEndDate'],
                    'training_title' => $_POST['trainingTitle'],
                    'training_content' => $_POST['trainingContent']
                ];

                if(empty($data['training_begin_date']) || empty($data['training_end_date']) || empty($data['training_title']) || empty($data['training_content'])) {
                    flash("addTrainingCv", "Veuillez remplir tous les champs");
                    break;
                }

                addTrainingCv($data);
                break;

            case "addPersonality":
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'user_Id' => $_SESSION['usersId'],
                    'personality_type' => $_POST['personalityType'],
                    'personality_keyword' => $_POST['personalityWord'],
                ];

                if(empty($data['user_Id']) || empty($data['personality_type']) || empty($data['personality_keyword'])) {
                    flash("addPersonality", "Veuillez remplir tous les champs");
                    break;
                }

                addPersonality($data);
                break;

            case "addSkill":
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    "user_Id" => $_SESSION['usersId'],
                    "skillType" => $_POST['skillType'],
                    "skillWord" => $_POST['skillWord'],
                    "skillLevel" => $_POST['skillLevel']
                ];

                if (empty($data['user_Id']) || empty($data['skillType']) || empty($data['skillWord']) || empty($data['skillLevel'])) {
                    flash("addSkill", "Veuillez remplir tous les champs");
                    break;
                }

                addSkill($data);
                break;

                // if($data['skillType']  == 'skill') {
                //     addSkill($data);
                //     break;
                // }
                // else if ($data['skillType']  == 'language') {
                //     addLanguage($data);
                //     break;
                // }
                // else {
                //     break;
                // }



            case "uploadImg":
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    // echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }

                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }

                // Check file size (5MB)
                if ($_FILES["fileToUpload"]["size"] > 5000000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }

                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    //   echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    // echo $target_file;
                    // pathing $target_file : uploads/basileKuntz6.jpg
                } else {
                    echo "Sorry, there was an error uploading your file.";
                    }
                };

                $data = [
                    "userId" => $_SESSION['usersId'],
                    "filePath" => $target_file
                ];

                addImgPath($data);
                break;
            }    
        } 
            
    }



    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'delete-experience') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $expId = $_GET['id'];
        
                deleteExp($expId);
            }
        }
        else if ($_GET['action'] === 'delete-training') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $trainingId = $_GET['id'];
        
                deleteTraining($trainingId);
            }
        }
        else if ($_GET['action'] === "deleteTrait") {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $traitId = $_GET['id'];
        
                deleteTrait($traitId);
            }
        }
        else if ($_GET['action'] === "deleteSkill") {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $skillId = $_GET['id'];
        
                deleteSkill($skillId);
            }
        }
        else if ($_GET['action'] === "deleteLang") {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $langId = $_GET['id'];
        
                deleteLang($langId);
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
    $trainings = getTrainings($identifier);
    $qualities = getQualities($identifier);
    $defaults = getDefaults($identifier);
    $skills = getSkills($identifier);
    $languages = getLanguages($identifier);
    $cvPhotoPath = getPhotoPath($identifier);

    


    require('templates/account.php');


