<?php
require_once 'lib/Session.php';
require_once 'lib/Cookie.php';

Session::start();

// Kiểm tra remember token trong cookie
if (!Session::get('user_id') && Cookie::get('remember_token')) {
    require_once 'models/User.php';
    $userModel = new User();
    $user = $userModel->findByRememberToken(Cookie::get('remember_token'));
    if ($user) {
        Session::set('user_id', $user['id']);
    }
}

// Lấy thông tin controller và action từ URL
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'auth';
$action = isset($_GET['action']) ? $_GET['action'] : 'login';
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Kiểm tra quyền truy cập
$publicActions = ['auth/login', 'auth/register'];
$currentAction = "{$controller}/{$action}";

if (!Session::get('user_id') && !in_array($currentAction, $publicActions)) {
    header('Location: index.php?controller=auth&action=login');
    exit();
}

// Khởi tạo controller tương ứng
switch ($controller) {
    case 'auth':
        require_once 'controllers/AuthController.php';
        $controller = new AuthController();
        break;
    case 'item':
        require_once 'controllers/ItemController.php';
        $controller = new ItemController();
        break;
    default:
        die("Controller not found");
}

// Gọi action trong controller
if (method_exists($controller, $action)) {
    if ($id) {
        $controller->{$action}($id);
    } else {
        $controller->{$action}();
    }
} else {
    die("Action not found");
}

?>