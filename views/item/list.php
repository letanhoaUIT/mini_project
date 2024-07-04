<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Items</title>
</head>
<body>
    <h1>Your Items</h1>
    <a href="index.php?controller=item&action=create">Create New Item</a>
    <ul>
        <?php foreach ($items as $item): ?>
            <li>
                <?= $item['title'] ?>
                <a href="index.php?controller=item&action=edit&id=<?= $item['id'] ?>">Edit</a>
                <a href="index.php?controller=item&action=delete&id=<?= $item['id'] ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>