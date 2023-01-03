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

    function sendFirstMsg($data) {
        $database = dbConnect();

        $statement = $database->prepare(
            "INSERT INTO messages (user_id, publisher_id, message) VALUES (?, ?, ?)"
        );

        $statement->execute([$data["userId"], $data["jobPublisherId"], $data["message"]]);
    }

    // function getConvs($identifier) {
    //     $database = dbConnect();

    //     $statement = $databse->prepare(
    //         "SELECT message from messages WHERE user_id = ?"
    //     )

    //     $convMessages = [];

    //     while($row = $statement->fetch()) {
    //         $message = [
    //             "message" => $row["message"]
    //         ];

    //         $messages[] = $message;

    //     };
    //     return $messages;
    //     }


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
