<?php include 'navbar.php'; ?>
<?php
// Connect to the database
$pdo = new PDO("mysql:host=localhost;dbname=shoes", "root", "mysql");

// Get the sort parameters from the query string
$sort_column = isset($_GET['sort']) ? $_GET['sort'] : 'shoe_name';  // Default sorting by shoe name
$sort_order = isset($_GET['order']) && $_GET['order'] == 'desc' ? 'desc' : 'asc'; // Default sorting in ascending order

// Get search query (if this is an AJAX request, we handle it differently)
$search_query = isset($_GET['search']) ? $_GET['search'] : '';

// Prepare the SQL query with dynamic sorting and search filter
$query = "SELECT * FROM shoes WHERE shoe_name LIKE :search_query OR shoe_brand LIKE :search_query OR shoe_model LIKE :search_query 
          ORDER BY $sort_column $sort_order";

$stmt = $pdo->prepare($query);
$stmt->execute(['search_query' => "%$search_query%"]);
$shoes = $stmt->fetchAll();

// If this is an AJAX request, return just the table rows
if (isset($_GET['ajax'])) {
    foreach ($shoes as $shoe) {
        echo "<tr>
                <td>" . htmlspecialchars($shoe['shoe_brand']) . "</td>
                <td>" . htmlspecialchars($shoe['shoe_name']) . "</td>
                <td>" . htmlspecialchars($shoe['shoe_model']) . "</td>
              </tr>";
    }
    exit;  // Exit to prevent the full page from being returned
}
?>

<section class="catalogue">
    <h2>Shoe Catalogue</h2>

    <!-- Search Bar -->
    <form id="searchForm" method="GET">
        <input type="text" name="search" id="search" placeholder="Search by name, brand, or model" value="<?php echo htmlspecialchars($search_query); ?>">
        <button type="submit">Search</button>
    </form>

    <!-- Table with Sortable Columns -->
    <table id="shoeTable">
        <tr>
            <th><a href="?sort=shoe_brand&order=<?php echo $sort_order == 'asc' ? 'desc' : 'asc'; ?>">Brand</a></th>
            <th><a href="?sort=shoe_name&order=<?php echo $sort_order == 'asc' ? 'desc' : 'asc'; ?>">Name</a></th>
            <th><a href="?sort=shoe_model&order=<?php echo $sort_order == 'asc' ? 'desc' : 'asc'; ?>">Model</a></th>
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

<script>
// Real-time search functionality with AJAX
document.getElementById('search').addEventListener('input', function() {
    let searchQuery = document.getElementById('search').value;
    fetchResults(searchQuery);
});

function fetchResults(searchQuery) {
    // Send AJAX request with 'ajax' parameter
    fetch('?search=' + searchQuery + '&ajax=1')
        .then(response => response.text())
        .then(data => {
            // Replace only the table content with new data
            document.getElementById('shoeTable').innerHTML = `
                <tr>
                    <th><a href="?sort=shoe_brand&order=<?php echo $sort_order == 'asc' ? 'desc' : 'asc'; ?>">Brand</a></th>
                    <th><a href="?sort=shoe_name&order=<?php echo $sort_order == 'asc' ? 'desc' : 'asc'; ?>">Name</a></th>
                    <th><a href="?sort=shoe_model&order=<?php echo $sort_order == 'asc' ? 'desc' : 'asc'; ?>">Model</a></th>
                </tr>
                ` + data;  // Append new rows to the table
        });
}
</script>
