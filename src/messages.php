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
            "INSERT INTO messages (conv_id, user_id, publisher_id, message) VALUES (?, ?, ?, ?)"
        );
        $statement->execute([$convId, $data["userId"], $data["jobPublisherId"], $data["message"]]);


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


    // Pour avoir une liste des conv il faut une table intermédiaire ?
    // OU Selectionner MAX=1 WHERE user_id et publisher_id (?,?)
    function getConv($identifier, $jobPublisherId) {
        $database = dbConnect();

        $statement = $database->prepare(
            "SELECT message FROM messages WHERE user_id = ? AND publisher_id = ?"
        );

        $statement->execute([$identifier, $jobPublisherId]);

        $conv = [];

        while($row = $statement->fetch()) {
            $message = [
                "userId" => $row["user_id"],
                "message" => $row["message"]
            ];

            $conv[] = $message;

        };
        return $conv;


    }
