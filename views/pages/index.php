<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/style.css">
</head>
<body>
    <h1><?php echo $data['title']; ?></h1>
    <p>This is the MVC Demo homepage.</p>
    <ul>
        <?php foreach($data['users'] as $user) : ?>
            <li><?php echo $user->name; ?> (<?php echo $user->email; ?>)</li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
