<?php
$mysqli = new mysqli("localhost", "root", "asdf", "shoppingcart");
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* style.css */

body {
    font-family: 'Arial', sans-serif;
    background: linear-gradient(to right, #f4f4f4, #e0e0e0); /* Subtle gradient background */
    margin: 0;
    padding: 0;
    color: #333;
}

.container {
    max-width: 600px;
    margin: 100px auto; /* Center container vertically */
    padding: 20px;
    background-color: white;
    border-radius: 12px; /* Rounded corners */
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2); /* Deeper shadow for depth */
    text-align: center;
}

h1 {
    color: #da33ff; /* Purple color for the header */
    margin-bottom: 20px;
    font-size: 2.5em; /* Larger font size */
    text-transform: uppercase; /* Uppercase letters for emphasis */
}

.nav-links {
    display: flex;
    flex-direction: column;
    gap: 15px; /* Spacing between links */
}

.nav-button {
    display: inline-block;
    padding: 15px 25px;
    background-color: #ff33e0; /* Pink button color */
    color: white;
    text-decoration: none;
    border-radius: 8px; /* Rounded button corners */
    transition: background-color 0.3s, transform 0.3s; /* Smooth transitions */
    font-size: 18px; /* Larger button font */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle button shadow */
}

.nav-button:hover {
    background-color: #ff1bc4; /* Darker pink on hover */
    transform: translateY(-2px); /* Lift effect on hover */
}

.logout {
    background-color: #da33ff; /* Red color for logout */
}

.logout:hover {
    background-color: #ff33e0; /* Darker red on hover */
}

/* Responsive styles */
@media (max-width: 600px) {
    .container {
        width: 90%; /* Make container responsive */
    }

    h1 {
        font-size: 2em; /* Adjust header size for smaller screens */
    }

    .nav-button {
        font-size: 16px; /* Adjust button size for smaller screens */
    }
}


    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Admin Dashboard</h1>
        <nav class="nav-links">
            <a href="categories/manage_categories.php" class="nav-button">Manage Categories</a>
            <a href="products/manage_products.php" class="nav-button">Manage Products</a>
            <a href="logout.php" class="nav-button logout">Logout</a>
        </nav>
    </div>
</body>
</html>
