<?php include 'navbar.php'; ?>
<link rel="stylesheet" href="styles_f.php">

<?php
$conn = new mysqli("localhost", "root", "mysql", "shoes");

// Fetch all users
$users_query = "SELECT user_id, user_name FROM users";
$users_result = $conn->query($users_query);

// Fetch all shoe names
$shoe_names_query = "SELECT DISTINCT shoe_name FROM shoes";
$shoe_names_result = $conn->query($shoe_names_query);
?>

<div class="container">
    <h1>Manage Collections</h1>

    <!-- Form to Select User and Shoe -->
    <form method="POST" action="add_to_collection.php">
        <label for="user_id">Select User:</label>
        <select name="user_id" id="user_id" required>
            <option value="">-- Select User --</option>
            <?php
            while ($row = $users_result->fetch_assoc()) {
                echo "<option value='" . $row['user_id'] . "'>" . $row['user_name'] . "</option>";
            }
            ?>
        </select>

        <label for="shoe_name">Select Shoe:</label>
        <select name="shoe_name" id="shoe_name" required>
            <option value="">-- Select Shoe --</option>
            <?php
            while ($row = $shoe_names_result->fetch_assoc()) {
                echo "<option value='" . $row['shoe_name'] . "'>" . $row['shoe_name'] . "</option>";
            }
            ?>
        </select>

        <!-- Populate models dynamically via JavaScript -->
        <label for="shoe_model">Select Model:</label>
        <select name="shoe_model" id="shoe_model" required>
            <option value="">-- Select Model --</option>
        </select>

        <button type="submit">Add to Collection</button>
    </form>
</div>

<script>
    // Fetch shoe models dynamically based on the selected shoe name
    document.getElementById('shoe_name').addEventListener('change', function () {
        const shoeName = this.value;
        const shoeModelDropdown = document.getElementById('shoe_model');

        // Clear existing options
        shoeModelDropdown.innerHTML = '<option value="">-- Select Model --</option>';

        if (shoeName) {
            fetch(`get_shoe_models.php?shoe_name=${shoeName}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(model => {
                        const option = document.createElement('option');
                        option.value = model.entry_id; // Correctly map `entry_id`
                        option.textContent = `Model ${model.shoe_model}`;
                        shoeModelDropdown.appendChild(option);
                    });
                });
        }
    });
</script>
