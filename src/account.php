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


    function getTrainings($identifier) {
        $database = dbConnect();

        $statement = $database->prepare(
            "SELECT id, training_title, training_begin_date, training_end_date, training_content FROM training WHERE user_id = ?"
        );
        $statement->execute([$identifier]);

        $trainings = [];

        while($row = $statement->fetch()) {
            $training = [
                "training_id" => $row['id'],
                "training_begin_date" => $row['training_begin_date'],
                "training_end_date" => $row['training_end_date'],
                "training_title" => $row['training_title'],
                "training_content" => $row['training_content']
            ];

            $trainings[] = $training;
        } 

        return $trainings;
    }


    function getQualities($identifier) {
        $database = dbConnect();

        $statement = $database->prepare(
            "SELECT id, personality_type, personality_keyword FROM traits WHERE user_id = ? AND personality_type = 'quality'"
        );

        $statement->execute([$identifier]);

        $qualities = [];

        while ($row = $statement->fetch()) {
            $quality = [
                "traitId" => $row["id"],
                "traitType" => $row["personality_type"],
                "traitKeyword" => $row["personality_keyword"]
            ];
            $qualities[] = $quality;
        };

        return $qualities;
    }


    function getDefaults($identifier) {
        $database = dbConnect();

        $statement = $database->prepare(
            "SELECT id, personality_type, personality_keyword FROM traits WHERE user_id = ? AND personality_type = 'default'"
        );

        $statement->execute([$identifier]);

        $defaults = [];

        while ($row = $statement->fetch()) {
            $default = [
                "traitId" => $row["id"],
                "traitType" => $row["personality_type"],
                "traitKeyword" => $row["personality_keyword"]
            ];
            $defaults[] = $default;
        };

        return $defaults;
    }


    function getSkills($identifier) {
        $database = dbConnect();

        $statement = $database->prepare(
            "SELECT skill_word, skill_lvl FROM skills WHERE user_id = ?"
        );
        $statement->execute([$identifier]);

        $skills = [];

        while($row = $statement->fetch()) {

            $skill = [
                "skillWord" => $row['skill_word'],
                "skillLevel" => $row['skill_lvl']
            ];
            $skills[] = $skill;
        }

        return $skills;
    }


    function getLanguages($identifier) {
        $database = dbConnect();

        $statement = $database->prepare(
            "SELECT lang_name, lang_lvl FROM languages WHERE user_id = ?"
        );
        $statement->execute([$identifier]);

        $languages = [];

        while($row = $statement->fetch()) {

            $lang = [
                "langWord" => $row['lang_name'],
                "langLevel" => $row['lang_lvl']
            ];
            $languages[] = $lang;
        }

        return $languages;
    }
    



    function deleteExp($expId) {
        $database = dbconnect();

        $statement = $database->prepare(
            "DELETE FROM experience WHERE id = ?"
        );
        $statement->execute([$expId]);
    }



    function deleteTraining($trainingId) {
        $database = dbConnect();

        $statement = $database->prepare(
            "DELETE FROM training WHERE id = ?"
        );

        $statement->execute([$trainingId]);
    }


    function deleteTrait($traitId) {
        $database = dbConnect();

        $statement = $database->prepare(
            "DELETE from traits WHERE id = ?"
        );
        $statement->execute([$traitId]);
    }


    function addExpCv($data) {
        $database = dbConnect();

        $statement = $database->prepare(
            "INSERT INTO experience (user_id, exp_begin_date, exp_end_date, exp_title, exp_content) VALUES (?, ?, ?, ?, ?)"
        );
        $statement->execute([$data['user_Id'], $data['exp_begin_date'], $data['exp_end_date'], $data['exp_title'], $data['exp_content']]);
    }


    function addTrainingCv($data) {
        $database = dbConnect();

        $statement = $database->prepare(
            "INSERT INTO training (user_id, training_begin_date, training_end_date, training_title, training_content) VALUES (?, ?, ?, ?, ?)"
        );
        $statement->execute([$data['user_Id'], $data['training_begin_date'], $data['training_end_date'], $data['training_title'], $data['training_content']]);
    }


    function addPersonality($data) {
        $database = dbConnect();

        $statement = $database->prepare(
            "INSERT INTO traits (user_id, personality_type, personality_keyword) VALUES (?, ?, ?)"
        );
        $statement->execute([$data['user_Id'], $data['personality_type'], $data['personality_keyword']]);
    }


    function addSkill($data) {
        $database = dbConnect();

        if($data['skillType'] == "skill") {
            $statement = $database->prepare(
                "INSERT INTO skills (user_id, skill_type, skill_word, skill_lvl) VALUES (?, ?, ?, ?)"
            );
        }
        else if ($data['skillType'] == "language") {
            $statement = $database->prepare(
                "INSERT INTO languages (user_id, skill_type, lang_name, lang_lvl) VALUES (?, ?, ?, ?)"
            );
        }
  

        $statement->execute([$data['user_Id'], $data['skillType'], $data['skillWord'], $data['skillLevel']]);
    }