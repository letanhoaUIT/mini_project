<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Item</title>
    <link rel="stylesheet" href="/assets/css/EditPage.css">
</head>
<body>
<div class="container">
    <h1>Create New Item</h1>
    <form action="index.php?controller=item&action=create" method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <label for="content">Content:</label>
        <textarea id="content" name="content" required></textarea>
        <button type="submit">Create</button>
    </form>
    <a class ="back-link" href="index.php?controller=item&action=index">Back to List</a>
</div>
</body>
</html>
