<?php
require_once 'models/Item.php';
require_once 'lib/Session.php';

class ItemController {
    private $itemModel;

    public function __construct() {
        $this->itemModel = new Item();
    }

    public function index() {
        $userId = Session::get('user_id'); //lấy user_id từ session làm việc 
        $items = $this->itemModel->getAllByUserId($userId);
        require 'views/item/list.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userId = Session::get('user_id');
            $title = $_POST['title'];
            $content = $_POST['content'];
            $this->itemModel->create($userId, $title, $content);
            header('Location: index.php?controller=item&action=index');
        } else {
            require 'views/item/create.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $this->itemModel->update($id, $title, $content);
            header('Location: index.php?controller=item&action=index');
        } else {
            $item = $this->itemModel->findById($id);
            require 'views/item/edit.php';
        }
    }

    public function delete($id) {
        $this->itemModel->delete($id);
        header('Location: index.php?controller=item&action=index');
    }
}
?>