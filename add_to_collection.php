<?php
$conn = new mysqli("localhost", "root", "mysql", "shoes");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $shoe_entry_id = $_POST['shoe_model'];

    $query = "INSERT INTO user_collections (user_id, shoe_id, mileage) VALUES ('$user_id', '$shoe_entry_id', 0)";
    if ($conn->query($query)) {
        echo "Shoe added to the user's collection successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<a href="collections.php" class="cta">Back to Collection</a>
