<?php
    session_start();
    require("src/messages.php");


    // Detail de la conv
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'convdetail') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                // On choppe l'id de la conv quand on clique sur une conv de la liste messages.php
                $convId = $_GET['id'];
        
                // Détails des messages de la conv 
                $convDetail = convDetail($convId);
            }
        }
    };

    // Envoi d'un message via form
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        switch($_POST['type']){
            case "sendMessage":

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    "userId" => $_SESSION["usersId"],
                    // "contactId" => $_POST["contactId"],
                    "convId" => $_POST["convId"],
                    "message" => $_POST["message"],
                    "messageType" => $_POST["msgType"]
                ];
                $convId = $_POST["convId"];

                sendMessage($data);
                setLastMessage($data);
                $convDetail = convDetail($_POST["convId"]);

                // updateLastMessage($data);
                break;


            case "sendImg":

                $target_dir = "uploads/convs/";
                // $target_dir = "uploads/convs/" . $convId . "/";
                $target_file = $target_dir . basename($_FILES["imgToConv"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["imgToConv"]["tmp_name"]);
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
                    if ($_FILES["imgToConv"]["size"] > 5000000) {
                        echo "Sorry, your file is too large.";
                        $uploadOk = 0;
                    }

                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                        echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
                        $uploadOk = 0;
                    }

                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["imgToConv"]["tmp_name"], $target_file)) {
                        //   echo "The file ". htmlspecialchars( basename( $_FILES["imgToConv"]["name"])). " has been uploaded.";
                        // echo $target_file;
                        // pathing $target_file : uploads/basileKuntz6.jpg
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                        }
                    };

                    $data = [
                        "userId" => $_SESSION['usersId'],
                        "convId" => $_POST["convId"],
                        "filePath" => "testImage",
                        "messageType" => $_POST["msgType"]
                    ];
                    $convId = $_POST["convId"];
                    addImgConvPath($data);
                    $convDetail = convDetail($_POST["convId"]);
                    break;
                }

                //////////////////////////////////////////////////////////////////////////////////
                // C'est le isset'sumbit' qui cassait tout ? (AUCUNE VERIFICATIONS DU FICHIER )
                $data = [
                    "userId" => $_SESSION['usersId'],
                    "convId" => $_POST["convId"],
                    "filePath" => $target_file,
                    "messageType" => $_POST["msgType"]
                ];
                addImgConvPath($data);
                move_uploaded_file($_FILES["imgToConv"]["tmp_name"], $target_file);

                $dataSetLastMsg = [
                    "message" => "Image",
                    "convId" => $_POST["convId"]
                ];
                setLastMessage($dataSetLastMsg);

                $convId = $_POST["convId"];
                $convDetail = convDetail($_POST["convId"]);
                break;

        }

    }
    
    
    
    require("templates/conv.php");
