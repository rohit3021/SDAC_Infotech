<?php
session_status(); // Start session to check login status
//include('navbar.php'); // Include the navbar
include('php/dbconfig.php'); // Include database configuration

// Check if the user is logged in
$is_logged_in = isset($_SESSION['admin_id']); // Check if the user_id is set in session
// $is_logged_in = isset($_SESSION['admin_id']); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            background-color: #212529;
            padding: 20px;
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 220px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }
        .sidebar h4 {
            color: #ffc107;
            margin-bottom: 30px;
            text-transform: uppercase;
            font-weight: 600;
            font-size: 18px;
            text-align: center;
            border-bottom: 2px solid #ffc107;
            padding-bottom: 10px;
        }
        .sidebar a {
            color: #adb5bd;
            display: block;
            padding: 15px;
            margin-bottom: 10px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
            font-size: 16px;
            font-weight: 500;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #ffc107;
            color: #212529;
        }
        .main-content {
            margin-left: 240px;
            padding: 40px;
        }
        .main-content h3 {
            font-weight: 600;
            color: #343a40;
            margin-bottom: 20px;
        }
        .main-content p {
            color: #6c757d;
            font-size: 16px;
        }
        .main-content .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 10px;
            transition: transform 0.3s;
        }
        .main-content .card:hover {
            transform: scale(1.05);
        }
        .main-content .btn-primary {
            background-color: #ffc107;
            border: none;
            transition: background-color 0.3s;
        }
        .main-content .btn-primary:hover {
            background-color: #e0a800;
        }
        footer {
            text-align: center;
            margin-top: 40px;
            color: #adb5bd;
            font-size: 14px;
        }
    </style>
</head>S
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-2 sidebar">
            <h4>Admin Panel</h4>
            <a href="index.php" class="active">Dashboard/View Posts</a>
            <a href="create_post.php">Add New Post</a>
            <!-- <a href="manage_post.php">Manage Posts</a> -->
            <a href="view_messages.php">View Messages</a>
            <a href="logout.php">Logout</a>
        </nav>

        <!-- Main content -->
        <div class="col-md-10 main-content">
            <h3>Welcome to the Admin Panel</h3>
            <p>Use the navigation on the left to manage blog posts and view contact messages.</p>

            <!-- Sample card layout for dashboard -->
            <div class="row">
                <!-- <div class="col-md-4">
                    <div class="card p-4">
                        <h5>Manage Posts</h5>
                        <p class="text-muted">View, edit, and delete blog posts easily.</p>
                        <a href="manage_post.php" class="btn btn-primary">Go to Posts</a>
                    </div>
                </div> -->
                <div class="col-md-4">
                    <div class="card p-4">
                        <h5>Add New Posts</h5>
                        <p class="text-muted">View, edit, and delete blog posts easily.</p>
                        <a href="create_post.php" class="btn btn-primary">Go to Posts</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4">
                        <h5>View Messages</h5>
                        <p class="text-muted">Check messages from visitors to your blog.</p>
                        <a href="view_messages.php" class="btn btn-primary">Go to Messages</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4">
                        <h5>Account Settings</h5>
                        <p class="text-muted">Manage your account and security settings.</p>
                        <a href="account_settings.php" class="btn btn-primary">Settings</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    <p>&copy; 2024 Blog Admin Panel. All Rights Reserved.</p>
</footer>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
