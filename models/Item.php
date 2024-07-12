<?php
require_once 'config/config.php';

class Item {
    private $db;

    public function __construct() {
        $this->db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    }

    public function getAllByUserId($userId) {
        $stmt = $this->db->prepare("SELECT * FROM items WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  // trả về kết quả dưới dạng mảng kết hợp 
    }

    public function create($userId, $title, $content) {
        $stmt = $this->db->prepare("INSERT INTO items (user_id, title, content) VALUES (:user_id, :title, :content)");
        return $stmt->execute(['user_id' => $userId, 'title' => $title, 'content' => $content]);
    }

    public function update($id, $title, $content) {
        $stmt = $this->db->prepare("UPDATE items SET title = :title, content = :content WHERE id = :id");
        return $stmt->execute(['title' => $title, 'content' => $content, 'id' => $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM items WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function findById($id) {
        $stmt = $this->db->prepare("SELECT * FROM items WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>