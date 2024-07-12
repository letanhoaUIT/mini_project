<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Items</title>
    <link rel="stylesheet" href="/assets/css/ListPage.css">
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <div class="logout-container">
        <a class="logout-button" id="logoutButton">Logout</a>
    </div>

    <script>
        $(document).ready(function() {
            $('#logoutButton').click(function() {
                // Gửi yêu cầu logout bằng Ajax
                $.ajax({
                    url: '/index.php?controller=auth&action=logout', // Đường dẫn đến phương thức logout
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            // Xử lý khi logout thành công (ví dụ: chuyển hướng hoặc cập nhật giao diện)
                            alert('Logout successful!');
                            // Ví dụ: chuyển hướng về trang login
                            window.location.href = 'index.php?controller=auth&action=login';
                        } else {
                            alert('Logout failed!');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Ajax request error:', status, error);
                    }
                });
            });
        });
    </script>
    <h1>MY DAIRY</h1>
    <a class ="new-item-button" href="index.php?controller=item&action=create">Create New Item</a>
    <ul>
        <?php foreach ($items as $item): ?>
            <div class="created-time"><?= date('F j, Y, g:i a', strtotime($item['created_at'])) ?></div>
            <li class="item-container">
                <div class="item-title"><?= $item['title'] ?></div>
                <div class="item-content"><?= $item['content'] ?></div>
                <a class="edit-button" href="index.php?controller=item&action=edit&id=<?= $item['id'] ?>">Edit</a>
                
                <a class="delete-button" href="index.php?controller=item&action=delete&id=<?= $item['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?')">X</a>
            </li>
        <?php endforeach; ?>
    </ul>

    
</body>
</html>