<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Item</title>
</head>
<body>
    <h1>Edit Item</h1>
    <form action="index.php?controller=item&action=edit&id=<?= $item['id'] ?>" method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?= $item['title'] ?>" required>
        <br>
        <label for="content">Content:</label>
        <textarea id="content" name="content" required><?= $item['content'] ?></textarea>
        <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>