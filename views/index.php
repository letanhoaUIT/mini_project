<?php
require_once 'lib/Session.php';
Session::start();

if (!Session::get('user_id')) {
    header('Location: index.php?controller=auth&action=login');
    exit();;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
    <h2>Welcome, User!</h2>
    <a href="index.php?controller=auth&action=logout">Logout</a>
    <br><br>
    <a href="index.php?controller=item&action=index">Mange Items</a>
</body>
</html>