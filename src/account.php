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



    function saveCvModel($data) {
        $database = dbConnect();

        // TEST
        $statement = $database->prepare(
            "UPDATE cv SET cv_first_name = ?, cv_last_name = ?, cv_tel = ?, cv_email = ?, cv_driving_licence = ?, cv_address = ?, cv_age = ? WHERE user_id = ?"
        );
        $statement->execute([$data['cv_first_name'], $data['cv_last_name'], $data['cv_tel'], $data['cv_email'], $data['cv_driving_licence'], $data['cv_address'], $data['cv_age'],$data['user_Id']]);
    }




    function getCv($identifier) {
        $database = dbConnect();

        $statement = $database->prepare(
            "SELECT cv_first_name,cv_last_name,cv_tel,cv_email,cv_driving_licence,cv_address,cv_age FROM cv WHERE user_id = ?"
        );
        $statement->execute([$identifier]);

        $row = $statement->fetch();
        $cv = [
            'cv_first_name' => $row['cv_first_name'],
            'cv_last_name' => $row['cv_last_name'],
            'cv_tel' => $row['cv_tel'],
            'cv_email' => $row['cv_email'],
            'cv_driving_licence' => $row['cv_driving_licence'],
            'cv_address' => $row['cv_address'],
            'cv_age' => $row['cv_age']
        ];
        
        return $cv;
    }