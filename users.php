<?php include 'navbar.php'; ?>
<?php
$pdo = new PDO("mysql:host=localhost;dbname=shoes", "root", "mysql");

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_user'])) {
        $name = $_POST['user_name'];
        $email = $_POST['user_email'];

        $stmt = $pdo->prepare("INSERT INTO users (user_name, user_email) VALUES (?, ?)");
        $stmt->execute([$name, $email]);
    } elseif (isset($_POST['delete_user'])) {
        $userId = $_POST['user_id'];

        // Delete the user and their collections
        $pdo->prepare("DELETE FROM user_collections WHERE user_id = ?")->execute([$userId]);
        $pdo->prepare("DELETE FROM users WHERE user_id = ?")->execute([$userId]);
    }
}

// Fetch all users
$users = $pdo->query("SELECT * FROM users")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
</head>
<body>
    <h1>User Management</h1>

    <!-- Add User Form -->
    <h2>Add User</h2>
    <form method="POST">
        <label for="user_name">Name:</label>
        <input type="text" name="user_name" id="user_name" required>
        <br>
        <label for="user_email">Email:</label>
        <input type="email" name="user_email" id="user_email" required>
        <br>
        <button type="submit" name="add_user">Add User</button>
    </form>

    <!-- List of Users -->
    <h2>All Users</h2>
    <table border="1">
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo htmlspecialchars($user['user_id']); ?></td>
            <td><?php echo htmlspecialchars($user['user_name']); ?></td>
            <td><?php echo htmlspecialchars($user['user_email']); ?></td>
            <td>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                    <button type="submit" name="delete_user">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
