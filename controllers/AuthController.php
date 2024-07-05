<?php 
require_once 'models/User.php';
require_once 'lib/Cookie.php';
require_once 'lib/Session.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Kiểm tra xem người dùng đã tồn tại hay chưa
            if ($this->userModel->findByUsername($username)) {
                echo "Username already exists.";
                return;
            }

            // Mã hóa mật khẩu
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Thêm người dùng mới vào cơ sở dữ liệu
            if ($this->userModel->addUser($username, $hashed_password)) {
                echo "User registered successfully.";
                header('Location: index.php?controller=auth&action=login');
            } else {
                echo "Failed to register user.";
            }
        } else {
            require 'views/register.php';
        }
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
                exit();
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
        header('Location: index.php?controller=auth&action=login');
        exit();
    }
    
}

?>