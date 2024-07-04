<?php
class Pages extends Controller {
    public function __construct() {
        // Load models or other initialization code
    }

    public function index() {
        $data = ['title' => 'Welcome'];
        $this->view('pages/index', $data);
    }
}
?>
