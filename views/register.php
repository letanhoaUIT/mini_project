<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="/assets/css/LoginPage.css">
</head>
<body>
    
    <form action="index.php?controller=auth&action=register" method="post">
    <h3>REGISTER</h3>
        <input type="text" id="username" name="username" required placeholder="Username">
        <input type="password" id="password" name="password" required placeholder="Password">
        <button type="submit">Register</button>
        <a href="index.php?controller=auth&action=login" class="italic-link">Already have an account?</a>
    </form>
    
</body>
</html>