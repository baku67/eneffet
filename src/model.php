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

    function getJobsFiltered($filters) {
        $database = dbConnect();

        if (($filters['category'] != "default") && (!empty($filters['locality']))) {
            $statement = $database->prepare(
                "SELECT id, title, author, date_creation, locality, contract_type, company, exp_years_needed FROM jobs WHERE category = ? AND locality = ?"
            );
            $statement->execute([$filters['category'], $filters['locality']]);
        }
        else if (($filters['category'] == "default") && (!empty($filters['locality']))) {
            $statement = $database->prepare(
                "SELECT id, title, author, date_creation, locality, contract_type, company, exp_years_needed FROM jobs WHERE locality = ?"
            );
            $statement->execute([$filters['locality']]);
        }
        else if ((empty($filters['locality'])) && ($filters['category'] != "default")) {
            $statement = $database->prepare(
                "SELECT id, title, author, date_creation, locality, contract_type, company, exp_years_needed FROM jobs WHERE category = ?"
            );
            $statement->execute([$filters['category']]);
        }
        else {
            $statement = $database->query(
                "SELECT id, title, author, date_creation, locality, contract_type, company, exp_years_needed FROM jobs ORDER BY date_creation DESC"
            );
        }

        // $statement = $database->prepare(
        //     "SELECT id, title, author, date_creation, locality, contract_type, company, exp_years_needed FROM jobs WHERE category = ? AND locality = ?"
        // );
        // // $statement->execute([$filters['category'], $filters['locality']]);
        // $statement->execute(["Tous", $filters['locality']]);


        $jobsFiltered = [];

        while($row = $statement->fetch()) {
            $job = [
                'identifier' => $row['id'],
                'title' => $row['title'],
                'author' => $row['author'],
                'date_creation' => $row['date_creation'],
                'locality' => $row['locality'],
                'contract_type' => $row['contract_type'],
                'company' => $row['company'],
                'exp_years_needed' => $row['exp_years_needed'],
            ];
            $jobsFiltered[] = $job;
        }

        return $jobsFiltered;
    }


    function getJobs() {

        $database = dbConnect();

        $statement = $database->query(
            "SELECT id, title, author, date_creation, locality, contract_type, company, exp_years_needed FROM jobs ORDER BY date_creation DESC"
        );

        $jobsFiltered = [];

        while($row = $statement->fetch()) {
            $job = [
                'identifier' => $row['id'],
                'title' => $row['title'],
                'author' => $row['author'],
                'date_creation' => $row['date_creation'],
                'locality' => $row['locality'],
                'contract_type' => $row['contract_type'],
                'company' => $row['company'],
                'exp_years_needed' => $row['exp_years_needed'],
            ];

            $jobsFiltered[] = $job;
        }
        return $jobsFiltered;
    }


    
    function getJob($identifier) {

        $database = dbConnect();

        $statement = $database->prepare(
            "SELECT id, publisher_id, title, author, date_creation, content, driving_licence, category, locality, company, start_date, exp_years_needed, contract_type FROM jobs WHERE id = ?"
        );
        $statement->execute([$identifier]);

        $row = $statement->fetch();
        $job = [
            'identifier' => $row['id'],
            'publisherId' => $row['publisher_id'],
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