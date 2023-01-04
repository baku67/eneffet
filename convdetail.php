<?php
    session_start();
    require("src/messages.php");

    // recup du convId

    // Detail de la conv
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'convdetail') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $convId = $_GET['id'];
        
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
                    "message" => $_POST["message"]
                ];

                sendMessage($data);
                setLastMessage($data);
                $convDetail = convDetail($_POST["convId"]);
                // updateLastMessage($data);
                break;
        }
    }


    
    require("templates/conv.php");
