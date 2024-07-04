<?php 
require_once 'models/User.php';
require_once 'lib/Cookie.php';
require_once 'lib/Session.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }
    
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $remember = isset($_POST['remember']);

            $user = $this->userModel->findByUsername($username);
            if ($user && password_verify($password, $user['password'])) {
                Session::set('user_id', $user['id']);
                if ($remember) {
                    $token = bin2hex(random_bytes(16));
                    $this->userModel->updateRememberToken($user['id'], $token);
                    Cookie::set('remember_token', $token, time() + (86400 * 30)); // 30 days
                }
                header('Location: index.php');
            } else {
                echo "Invalid username or password.";
            }
        } else {
            require 'views/login.php';
        }
    }

    public function logout() {
        Session::destroy();
        Cookie::delete('remember_token');
        header('Location: index.php');
    }
    
}

?>