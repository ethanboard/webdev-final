<?php
$conn = new mysqli("localhost", "root", "mysql", "shoes");

if (isset($_GET['shoe_name'])) {
    $shoe_name = $_GET['shoe_name'];

    $query = "SELECT entry_id, shoe_model FROM shoes WHERE shoe_name = '$shoe_name'";
    $result = $conn->query($query);

    $models = [];
    while ($row = $result->fetch_assoc()) {
        $models[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($models);
}
?>
