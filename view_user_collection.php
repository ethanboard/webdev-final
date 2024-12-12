<?php include 'navbar.php'; ?>
<link rel="stylesheet" href="styles_f.php">
<?php
$pdo = new PDO("mysql:host=localhost;dbname=shoes", "root", "mysql");

// Get user_id from URL
$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : null;

if ($user_id) {
    // Fetch the user's collection of shoes
    $query = "SELECT sc.collection_id, s.shoe_name, s.shoe_brand, s.shoe_model, sc.mileage 
              FROM user_collections sc 
              JOIN shoes s ON sc.shoe_id = s.entry_id 
              WHERE sc.user_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$user_id]);
    $collections = $stmt->fetchAll();
}

// Handle mileage update and shoe removal
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_mileage'])) {
        $collection_id = $_POST['collection_id'];
        $new_mileage = $_POST['mileage'];
        $stmt = $pdo->prepare("UPDATE user_collections SET mileage = ? WHERE collection_id = ?");
        $stmt->execute([$new_mileage, $collection_id]);
    } elseif (isset($_POST['add_mileage'])) {
        $collection_id = $_POST['collection_id'];
        $additional_mileage = $_POST['additional_mileage'];
        // Fetch current mileage to add the additional mileage
        $stmt = $pdo->prepare("SELECT mileage FROM user_collections WHERE collection_id = ?");
        $stmt->execute([$collection_id]);
        $current_mileage = $stmt->fetchColumn();
        $new_mileage = $current_mileage + $additional_mileage;
        $stmt = $pdo->prepare("UPDATE user_collections SET mileage = ? WHERE collection_id = ?");
        $stmt->execute([$new_mileage, $collection_id]);
    } elseif (isset($_POST['delete_shoe'])) {
        $collection_id = $_POST['collection_id'];
        $stmt = $pdo->prepare("DELETE FROM user_collections WHERE collection_id = ?");
        $stmt->execute([$collection_id]);
    }
    
    // Reload the page after POST request to refresh the data
    header("Location: view_user_collection.php?user_id=" . $user_id);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Shoe Collection</title>
</head>
<body>
<div class="container">
    <h1>User Shoe Collection</h1>

    <table border="1">
        <tr>
            <th>Shoe Name</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Mileage</th>
            <th>Action</th>
        </tr>
        <?php foreach ($collections as $collection): ?>
        <tr>
            <td><?php echo htmlspecialchars($collection['shoe_name']); ?></td>
            <td><?php echo htmlspecialchars($collection['shoe_brand']); ?></td>
            <td><?php echo htmlspecialchars($collection['shoe_model']); ?></td>
            <td><?php echo htmlspecialchars($collection['mileage']); ?></td>
            <td>
                <!-- Update Mileage Form -->
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="collection_id" value="<?php echo $collection['collection_id']; ?>">
                    <label for="mileage">Set Mileage:</label>
                    <input type="number" name="mileage" required>
                    <button type="submit" name="update_mileage">Set</button>
                </form>
                <!-- Add Mileage Form -->
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="collection_id" value="<?php echo $collection['collection_id']; ?>">
                    <br>
                    <label for="additional_mileage">Add Mileage:</label>
                    <input type="number" name="additional_mileage" required>
                    <button type="submit" name="add_mileage">Add</button>
                </form>
                <!-- Delete Shoe Form -->
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="collection_id" value="<?php echo $collection['collection_id']; ?>">
                    <button type="submit" name="delete_shoe" onclick="return confirm('Are you sure you want to delete this shoe from the collection?');">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
