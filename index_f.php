<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_f.php">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <title>Shoe Catalogue</title>
</head>
<body>

    <!-- Hero Section -->
    <header class="hero">
        <div class="hero-content">
            <h1>Welcome to ShoeTracker</h1>
            <p>Track your shoes, mileage, and performance.</p>
            <a href="users.php" class="cta">Get Started</a>
        </div>
    </header>

    <!-- Main Content Section -->
    <section class="main-content">
        <div class="row flexbox">
            <div class="column">
                <h2>Why Us?</h2>
                <p>Are you tried of aching knees on runs just to find out it's due to your shoes huge mileage? Then look no further, we are here to make tracking your shoes mileage easy. </p>
                <a href="about.php" class="cta-btn">About Us</a>
            </div>
            <div class="column">
                <img src="351shoes_column.jpg" alt="Shoes" class="image">
            </div>
        </div>
        <div class="row track-mileage">
            <h2>View Our Catalogue of Shoes!</h2>
            <p>Maintain your shoe collection and stay on top of performance.</p>
            <a href="shoes_catalogue.php" class="cta-btn">View Shoes</a>
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 ShoeTracker. All rights reserved.</p>
    </footer>

</body>
</html>

<style>
    /* Global Styles */
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
        color: #333;
    }

    h1, h2 {
        font-family: 'Roboto', sans-serif;
        font-weight: 500;
    }

    /* Hero Section */
    .hero {
        background-image: url('351shoes.webp');
        background-size: cover;
        background-position: center;
        color: white;
        text-align: center;
        padding: 80px 20px;
        position: relative;
    }

    .hero::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero h1 {
        font-size: 4rem;
        margin-bottom: 20px;
    }

    .hero p {
        font-size: 1.5rem;
        margin-bottom: 30px;
    }

    .cta {
        padding: 12px 25px;
        background-color: #FF6F61;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-size: 1.2rem;
        transition: background-color 0.3s ease;
    }

    .cta:hover {
        background-color: #e15c4b;
    }

    /* Main Content Section */
    .main-content {
        padding: 60px 20px;
        text-align: center;
    }

    .row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 40px;
    }

    .column {
        flex: 1;
        margin: 0 20px;
        text-align: left;
    }

    .column img {
        width: 100%;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .column img:hover {
        transform: scale(1.05);
    }

    .cta-btn {
        display: inline-block;
        margin-top: 20px;
        padding: 12px 25px;
        background-color: #FF6F61;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-size: 1.2rem;
        transition: background-color 0.3s ease;
    }

    .cta-btn:hover {
        background-color: #e15c4b;
    }

    /* Track Mileage Section */
    .track-mileage {
        background-color: #f4f4f4;
        padding: 60px 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Footer */
    footer {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 20px;
        position: relative;
        bottom: 0;
        width: 100%;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .row {
            flex-direction: column;
        }

        .column {
            margin-bottom: 20px;
        }

        .hero h1 {
            font-size: 3rem;
        }

        .hero p {
            font-size: 1.2rem;
        }
    }
</style>
