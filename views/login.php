<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="/assets/css/LoginPage.css">
</head>
<body>
    <form action="index.php?controller=auth&action=login" method="post">
        <label>LOGIN</label>
        <input type="text" id="" name="username" required placeholder="Enter username">
        <input type="password" id="password" name="password" requirered placeholder="Enter password">
        <label for="remember" class="remember">
            <input type="checkbox" id="remember" name="remember"> Remember me
        </label>
        <button type="submit">Login</button>
        <a href="index.php?controller=auth&action=register">Or Register Now!</a> <!--chuyen huong den register -->
    </form>
    
</body>
</html>
