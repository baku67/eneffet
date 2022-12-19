<?php 

require_once '../src/User.php';
require_once '../helpers/session_helper.php';

class Users {

    private $userModel;

    public function __construct() 
    {
        $this->userModel = new User;
    }

    public function register() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
            'username' => trim($_POST['username']),
            'mail' => trim($_POST['mail']),
            'password' => trim($_POST['password']),
            'passwordRepeat' => trim($_POST['passwordRepeat'])
        ];

        if(empty($data['username']) || empty($data['mail']) || empty($data['password']) || empty($data['passwordRepeat'])){
            flash("register", "Veuillez remplir tout les champs");
            redirect("../index.php");
        }

        // if(!preg_match("/^[a-zA-Z0-9]*$/", $data['usersUid'])){
        //     flash("register", "Invalid username");
        //     redirect("../index.php");
        // }

        if(!filter_var($data['mail'], FILTER_VALIDATE_EMAIL)){
            flash("register", "Invalid email");
            redirect("../index.php");
        }

        if(strlen($data['password']) < 6){
            flash("register", "Invalid password");
            redirect("../index.php");
        } else if($data['password'] !== $data['passwordRepeat']){
            flash("register", "Passwords don't match");
            redirect("../index.php");
        }

        //User with the same email or password already exists
        if($this->userModel->findUserByEmailOrUsername($data['mail'], $data['username'])){
            flash("register", "Username or email already taken");
            redirect("../index.php");
        }

        //Passed all validation checks.
        //Now going to hash password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        //Register User
        if($this->userModel->register($data)){
            redirect("../index.php");
        }else{
            die("Something went wrong");
        }
    }

    public function login() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data=[
            "name/email" => trim($_POST['name/email']),
            "password" => trim($_POST['password'])
        ];

        if(empty($data['name/email']) || empty($data['password'])){
            flash("login", "Veuillez remplir tout les champs");
            header("location: ../index.php");
            exit();
        }

        // Check for username/email
        if($this->userModel->findUserByEmailOrUsername($data['name/email'], $data['name/email'])){
            // User found
            $loggedInUser = $this->userModel->login($data['name/email'], $data['password']);
            if($loggedInUser){
                // Create session
                $this->createUserSession($loggedInUser);
            }
            else{
                flash("login", "Mot de passe incorrect");
                redirect('../index.php');
            }
        }
        else{
            flash("login", "Utilisateur non trouvé");
            redirect("../index.php");
        }
    }

    public function createUserSession($user){
        $_SESSION['usersId'] = $user->id;
        $_SESSION['usersName'] = $user->username;
        $_SESSION['usersEmail'] = $user->mail;
        redirect('../index.php');
    }

    public function logout(){
        unset($_SESSION['usersId']);
        unset($_SESSION['usersName']);
        unset($_SESSION['usersEmail']);
        session_destroy();
        redirect('../index.php');
    }
}

$init = new Users;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    switch($_POST['type']){
        case 'register':
            $init->register();
            break;
        case 'login':
            $init->login();
            break;
        default:
            redirect('../index.php');
    }
}
else {
    switch($_GET['q']){
        case 'logout':
            $init->logout();
            break;
        default:
        redirect('../index.php');
    }
}