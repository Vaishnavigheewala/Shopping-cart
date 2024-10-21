<?php
$mysqli = new mysqli("localhost", "root", "asdf", "shoppingcart");
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}

// Query to get all categories
$result = $mysqli->query("SELECT * FROM categories");
$categories = []; // Array to hold categories
while ($row = $result->fetch_assoc()) {
    $categories[] = $row; // Add each category to the array
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories</title>
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
    max-width: 800px;
    margin: 50px auto; /* Center container */
    padding: 20px;
    background-color: white;
    border-radius: 12px; /* Rounded corners */
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2); /* Deeper shadow for depth */
    text-align: center;
    margin-top: 120px;
}

h1 {
    color: #da33ff; /* Purple color for the header */
    margin-bottom: 20px;
    font-size: 2.5em; /* Larger font size */
    text-transform: uppercase; /* Uppercase for emphasis */
}

.btn {
    display: inline-block;
    padding: 12px 25px;
    background-color: #ff33e0; /* Pink button color */
    color: white;
    text-decoration: none;
    border-radius: 8px; /* Rounded button corners */
    margin-bottom: 20px;
    transition: background-color 0.3s, transform 0.3s; /* Smooth transitions */
    font-size: 18px; /* Larger button font */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle button shadow */
}

.btn:hover {
    background-color: #ff1bc4; /* Darker pink on hover */
    transform: translateY(-2px); /* Lift effect on hover */
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px; /* Spacing above the table */
}

th, td {
    padding: 12px;
    border: 1px solid #ddd; /* Light grey border */
    text-align: left;
}

th {
    background-color: #f2f2f2; /* Light grey header */
    color: #333;
}

tr:nth-child(even) {
    background-color: #f9f9f9; /* Alternate row color */
}

.action-btn {
    padding: 6px 12px;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s; /* Smooth transition for hover effect */
}

.action-btn:hover {
    opacity: 0.8; /* Slightly dim the button on hover */
}

.edit {
    background-color: #da33ff; /* Purple color for edit */
}

.edit:hover {
    background-color: #c62bd6; /* Darker purple on hover */
}

.delete {
    background-color: #f44336; /* Red color for delete */
}

.delete:hover {
    background-color: #e53935; /* Darker red on hover */
}

.back {
    background-color: #da33ff; /* Blue color for back */
}

.back:hover {
    background-color: #ff33e0; /* Darker blue on hover */
}

/* Responsive styles */
@media (max-width: 600px) {
    .container {
        width: 90%; /* Make container responsive */
    }

    h1 {
        font-size: 2em; /* Adjust header size for smaller screens */
    }

    .btn {
        font-size: 16px; /* Adjust button size for smaller screens */
    }
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Manage Categories</h1>
        <a href="add_category.php" class="btn">Add New Category</a>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category) : ?>
                    <tr>
                        <td><?= htmlspecialchars($category['name']) ?></td>
                        <td>
                        <a href="edit_category.php?id=<?= $category['id'] ?>" class="action-btn edit">Edit</a>
                            <a href="delete_category.php?id=<?= $category['id'] ?>" class="action-btn delete">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table><br><br/>
        <a href="../dashboard.php" class="btn back">Back to Dashboard</a>
    </div>
</body>
</html>
