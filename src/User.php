<?php 

    require_once '../libraries/Database.php';

    class User {
        private $db;

        public function __construct() 
        {
            $this->db = new Database;
        }

        public function findUserByEmailOrUsername($mail, $username){
            $this->db->query('SELECT * FROM users WHERE username = :username OR mail = :mail');
            $this->db->bind(':username', $username);
            $this->db->bind(':mail', $mail);

            $row = $this->db->single();

            if($this->db->rowCount() > 0){
                return $row;
            }
            else {
                return false;
            }
        }

        // Register User
        public function register($data){
            $this->db->query('INSERT INTO users (username, mail, password) VALUES (:name, :mail, :password)');

            $this->db->bind(':name', $data['username']);
            $this->db->bind(':mail', $data['mail']);
            $this->db->bind(':password', $data['password']);

            if($this->db->execute()){
                return true;
            }
            else {
                return false;
            }
        }

        // Login User
        public function login($nameOrEmail, $password){

            $row = $this->findUserByEmailOrUsername($nameOrEmail, $nameOrEmail);
            
            if($row == false) return false;

            $hashedPassword = $row->password;
            if(password_verify($password, $hashedPassword)){
                return $row;
            }
            else {
                return false;
            }
        }
    }