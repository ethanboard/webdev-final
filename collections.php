<?php include 'navbar.php'; ?>
<?php
$pdo = new PDO("mysql:host=localhost;dbname=shoes", "root", "mysql");

// Fetch all users and shoes
$users = $pdo->query("SELECT * FROM users")->fetchAll();
$shoes = $pdo->query("SELECT * FROM shoes")->fetchAll();

// Handle adding a shoe to a user's collection
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_shoe'])) {
        $userId = $_POST['user_id'];
        $shoeId = $_POST['shoe_id'];

        $stmt = $pdo->prepare("INSERT INTO user_collections (user_id, shoe_id) VALUES (?, ?)");
        $stmt->execute([$userId, $shoeId]);
    } elseif (isset($_POST['update_mileage'])) {
        $collectionId = $_POST['collection_id'];
        $mileage = $_POST['mileage'];

        $stmt = $pdo->prepare("UPDATE user_collections SET mileage = ? WHERE collection_id = ?");
        $stmt->execute([$mileage, $collectionId]);
    }
}

// Fetch all user collections
$collections = $pdo->query("
    SELECT uc.collection_id, u.user_name, s.shoe_name, uc.mileage 
    FROM user_collections uc
    JOIN users u ON uc.user_id = u.user_id
    JOIN shoes s ON uc.shoe_id = s.entry_id
")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoe Collections</title>
</head>
<body>
    <h1>Shoe Collections</h1>

    <!-- Add Shoe to User Collection -->
    <h2>Add Shoe to Collection</h2>
    <form method="POST">
        <label for="user_id">User:</label>
        <select name="user_id" id="user_id" required>
            <?php foreach ($users as $user): ?>
            <option value="<?php echo $user['user_id']; ?>"><?php echo htmlspecialchars($user['user_name']); ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="shoe_id">Shoe:</label>
        <select name="shoe_id" id="shoe_id" required>
            <?php foreach ($shoes as $shoe): ?>
            <option value="<?php echo $shoe['entry_id']; ?>"><?php echo htmlspecialchars($shoe['shoe_name']); ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <button type="submit" name="add_shoe">Add Shoe</button>
    </form>

    <!-- User Collections -->
    <h2>All Collections</h2>
    <table border="1">
        <tr>
            <th>User</th>
            <th>Shoe</th>
            <th>Mileage</th>
            <th>Action</th>
        </tr>
        <?php foreach ($collections as $collection): ?>
        <tr>
            <td><?php echo htmlspecialchars($collection['user_name']); ?></td>
            <td><?php echo htmlspecialchars($collection['shoe_name']); ?></td>
            <td><?php echo htmlspecialchars($collection['mileage']); ?></td>
            <td>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="collection_id" value="<?php echo $collection['collection_id']; ?>">
                    <input type="number" name="mileage" step="0.1" placeholder="New Mileage" required>
                    <button type="submit" name="update_mileage">Update Mileage</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
