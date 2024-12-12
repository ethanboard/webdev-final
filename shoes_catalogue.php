<?php include 'navbar.php'; ?>
<?php
// Connect to the database
$pdo = new PDO("mysql:host=localhost;dbname=shoes", "root", "mysql");

// Fetch shoes from the catalogue
$stmt = $pdo->query("SELECT * FROM shoes");
$shoes = $stmt->fetchAll();
?>

<section class="catalogue">
    <h2>Shoe Catalogue</h2>
    <table>
        <tr>
            <th>Brand</th>
            <th>Name</th>
            <th>Model</th>
        </tr>
        <?php foreach ($shoes as $shoe): ?>
        <tr>
            <td><?php echo htmlspecialchars($shoe['shoe_brand']); ?></td>
            <td><?php echo htmlspecialchars($shoe['shoe_name']); ?></td>
            <td><?php echo htmlspecialchars($shoe['shoe_model']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</section>
