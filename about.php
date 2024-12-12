<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_f.php">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <title>About Us - ShoeTracker</title>
</head>
<body>

    <!-- About Section -->
    <section class="about-section">
        <div class="about-content">
            <h1>About ShoeTracker</h1>
            <p>ShoeTracker is designed for runners who want to track their shoes' mileage and performance. It’s not just about logging runs – it’s about tracking the most important aspect of your gear: your shoes. We know how important it is to have the right pair of shoes for the right amount of mileage, and that’s where we come in.</p>
            
            <div class="about-details">
                <div class="detail">
                    <h2>Why Track Your Shoes?</h2>
                    <p>Running shoes wear down over time, and every runner needs to stay on top of the condition of their shoes to prevent injury. Our app helps you track mileage, shoe performance, and shoe life so that you can stay ahead of your training needs and make sure your shoes are up for the challenge!</p>
                </div>
                <div class="detail">
                    <h2>What We Offer</h2>
                    <p>With ShoeTracker, you can easily monitor your shoes’ usage, receive notifications when it's time to replace them, and get insights into your training. We are here to make your running experience better, one step at a time!</p>
                </div>
            </div>

            <div class="about-cta">
                <p>Ready to take control of your running shoes? Get started today!</p>
                <!-- Profile Creation Form -->
                <div class="row">
                    <h2>Create Your Profile</h2>
                    <form action="users.php" method="POST" class="profile-form">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="user_name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="user_email" required>
                        </div>
                        <button type="submit" name="add_user" class="cta-btn">Create Profile</button>
                    </form>
                </div>
            </div>
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

    /* About Section */
    .about-section {
        padding: 80px 20px;
        text-align: center;
        background-color: #f4f4f4;
        border-bottom: 10px solid #FF6F61;
    }

    .about-content {
        max-width: 1000px;
        margin: 0 auto;
    }

    .about-content h1 {
        font-size: 3rem;
        margin-bottom: 20px;
    }

    .about-content p {
        font-size: 1.2rem;
        margin-bottom: 40px;
        line-height: 1.6;
    }

    .about-details {
        display: flex;
        justify-content: space-between;
        margin-bottom: 40px;
    }

    .detail {
        flex: 1;
        margin: 0 20px;
        text-align: left;
    }

    .detail h2 {
        font-size: 2rem;
        margin-bottom: 15px;
        color: #FF6F61;
    }

    .detail p {
        font-size: 1.1rem;
        line-height: 1.6;
    }

    .about-cta {
        margin-top: 40px;
    }

    .about-cta p {
        font-size: 1.5rem;
        margin-bottom: 20px;
    }

    .cta-btn {
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
        .about-details {
            flex-direction: column;
        }

        .detail {
            margin-bottom: 20px;
        }

        .about-content h1 {
            font-size: 2.5rem;
        }

        .about-content p {
            font-size: 1.1rem;
        }
    }
</style>
