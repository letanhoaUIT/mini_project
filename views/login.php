<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <form action="index.php?controller=auth&action=login" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="remember">
            <input type="checkbox" id="remember" name="remember"> Remember me
        </label>
        <br>
        <button type="submit">Login</button>
    </form>
    <a href="index.php?controller=auth&action=register">Register</a> <!--chuyen huong den register -->
</body>
</html>
