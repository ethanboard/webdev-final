<?php
$host = 'localhost';
$dbname = 'shoes';
$user = 'ethan';
$pass = '308NegraArroyo';

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$stmt = $pdo->query('SELECT * FROM data');
$data = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Running Shoes</title>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Model</th>
        </tr>
        <?php foreach ($data as $row): ?>
        <tr>
            <td><?php echo $row['entry_id']; ?></td>
            <td><?php echo $row['shoe_name']; ?></td>
            <td><?php echo $row['shoe_brand']; ?></td>
            <td><?php echo $row['shoe_model']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
