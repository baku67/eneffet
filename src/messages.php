<?php 

    function dbConnect() {
        try {
            $database = new PDO("mysql:host=localhost;dbname=indid;charset=utf8", "root", "");

            return $database;
        }
        catch(Exeption $e) {
            die("Erreur : " .$e->getMessage());
        }
    }



    function createConv($data) {
        $database = dbConnect();

        $statement = $database->prepare(
            "INSERT INTO convs (user_id, contact_id) VALUES (?, ?)"
        );

        $statement->execute([$data["userId"], $data["jobPublisherId"]]);
    }


    function sendFirstMsg($data) {
        $database = dbConnect();

        // Récupération de l'id de la conv entre l'user et le contact
        $statement0 = $database->prepare(
            "SELECT conv_id from convs WHERE user_id = ? AND contact_id = ?"
        );
        $statement0->execute([$data['userId'], $data['jobPublisherId']]);
        $row = $statement0->fetch();

        $convId = $row['conv_id'];


        // Envoi du 1er message de la conv apres creation conv
        $statement = $database->prepare(
            "INSERT INTO messages (conv_id, user_id, publisher_id, message, type) VALUES (?, ?, ?, ?, ?)"
        );
        $statement->execute([$convId, $data["userId"], $data["jobPublisherId"], $data["message"], $data["messageType"], "text"]);


        // Update du last_message de la conv correspondante:
        $statement1 = $database->prepare(
            "UPDATE convs SET last_message = ? WHERE conv_id = ?"
        );
        $statement1->execute([$data["message"], $convId]);
    }








    function getConvs($identifier) {
        $database = dbConnect();

        $statement = $database->prepare(
            "SELECT conv_id, user_id, contact_id, last_message FROM convs WHERE user_id = ? OR contact_id = ?"
        );
        $statement->execute([$identifier, $identifier]);

        $convs = [];

        while($row = $statement->fetch()) {
            $conv = [
                "convId" => $row["conv_id"],
                "lastMessage" => $row["last_message"]
            ];

            $convs[] = $conv;

        };

        return $convs;
    }




    function convDetail($convId) {
        $database = dbConnect();

        $statement = $database->prepare(
            "SELECT user_id, message, type, img_url FROM messages WHERE conv_id = ?"
        );
        $statement->execute([$convId]);

        $messagesConv = [];

        while($row = $statement->fetch()) {
            $msg = [
                "senderId" => $row["user_id"],
                "message" => $row["message"],
                "imageUrl" => $row["img_url"],
                "messageType" => $row["type"]
            ];
            $messagesConv[] = $msg;
        }

        return $messagesConv;
    }



    function sendMessage($data) {
        $database = dbConnect();

        $statement = $database->prepare(
            "INSERT INTO messages (conv_id, user_id, type, message) VALUES (?, ?, ?, ?)"
        );
        $statement->execute([$data["convId"], $data["userId"], $data["messageType"], $data["message"]]);
    }



    function addImgConvPath($data) {
        $database = dbConnect();

        $statement = $database->prepare(
            "INSERT INTO messages (conv_id, user_id, type, img_url) VALUES (?, ?, ?, ?)"
        );
        $statement->execute([$data["convId"], $data["userId"], $data["messageType"], $data["filePath"]]);

    }



    function setLastMessage($data) {
        $database = dbConnect();

        $statement = $database->prepare(
            "UPDATE convs SET last_message = ? WHERE conv_id = ?"
        );
        $statement->execute([$data["message"], $data["convId"]]);
    }
