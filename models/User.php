// models/User.php

<?php
require_once 'config/config.php'; //include code of file config.php and included only once during execution
class User {
    private $db;

    public function __construct() {
        $this->db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_USER, DB_PASS);
        //connect to db using PDO (PHP Data Objects). it help avoid SQL injection
    }

    public function findByUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } // fetch: lay kq cua cau lenh SQL

    public function create($username, $password) {
        $stmt = $this->db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        return $stmt->execute(['username' => $username, 'password' => password_hash($password, PASSWORD_BCRYPT)]);
    }
    public function findByRememberToken($token) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE remember_token = :token");
        $stmt->execute(['token' => $token]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}


?>