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


    function getJobs() {

        $database = dbConnect();

        $statement = $database->query(
            "SELECT id, title, author, date_creation FROM jobs ORDER BY date_creation DESC"
        );

        $jobs = [];

        while($row = $statement->fetch()) {
            $job = [
                'identifier' => $row['id'],
                'title' => $row['title'],
                'author' => $row['author'],
                'date_creation' => $row['date_creation'],
            ];

            $jobs[] = $job;
        }

        return $jobs;
    }


    function getJob($identifier) {

        $database = dbConnect();

        $statement = $database->prepare(
            "SELECT title, author, date_creation, content, driving_licence, category, locality, company, start_date, exp_years_needed, contract_type FROM jobs WHERE id = ?"
        );
        $statement->execute([$identifier]);


        $row = $statement->fetch();
        $job = [
            'title' => $row['title'],
            'author' => $row['author'],
            'date_creation' => $row['date_creation'],
            'content' => $row['content'],
            'driving_licence' => $row['driving_licence'],
            'category' => $row['category'],
            'locality' => $row['locality'],
            'company' => $row['company'],
            'start_date' => $row['start_date'],
            'exp_years_needed' => $row['exp_years_needed'],
            'contract_type' => $row['contract_type']
        ];
        
        return $job;



    }