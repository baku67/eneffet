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

    function getExperiences($identifier) {
        $database = dbConnect();

        $statement = $database->prepare(
            "SELECT id, exp_begin_date, exp_end_date, exp_title, exp_content FROM experience WHERE user_id = ?"
        );
        $statement->execute([$identifier]);

        $exps = [];

        while($row = $statement->fetch()) {
            $exp = [
                "exp_id" => $row['id'],
                "exp_begin_date" => $row['exp_begin_date'],
                "exp_end_date" => $row['exp_end_date'],
                "exp_title" => $row['exp_title'],
                "exp_content" => $row['exp_content']
            ];
            $exps[] = $exp;
        }

        return $exps;
    }

    function deleteExp($expId) {
        $database = dbconnect();

        $statement = $database->prepare(
            "DELETE FROM experience WHERE id = ?"
        );
        $statement->execute([$expId]);
    }


    function addExpCv($data) {
        $database = dbConnect();

        $statement = $database->prepare(
            "INSERT INTO experience (user_id, exp_begin_date, exp_end_date, exp_title, exp_content) VALUES (?, ?, ?, ?, ?)"
        );
        $statement->execute([$data['user_Id'], $data['exp_begin_date'], $data['exp_end_date'], $data['exp_title'], $data['exp_content']]);

    }