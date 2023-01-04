<?php
    session_start();
    require("src/messages.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
        switch($_POST['type']){
            case "startConv":
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    "userId" => $_SESSION["usersId"],
                    "jobPublisherId" => $_POST["jobPublisherId"],
                    "message" => $_POST["inputMessage"]
                ];

                if(empty($data["userId"]) || empty($data["jobPublisherId"]) || empty($data["message"])) {
                    break;
                }

                createConv($data);
                sendFirstMsg($data);

                break;
        }
    }

    $identifier = $_SESSION["usersId"];

    $convs = getConvs($identifier);


    require("templates/messages.php");