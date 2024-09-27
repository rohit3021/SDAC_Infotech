<?php
session_status(); // Start the session
//include('navbar.php');
include('php/dbconfig.php');
// Check if the user is logged in, redirect to login if not
// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
//     header('location: login_admin.php'); // Redirect to admin login page
//     exit;
// }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $image_url = $_POST['image_url'];
    $content = $_POST['content'];
    //$author = $_SESSION['admin_id']; // Use the logged-in admin's username

    $sql = "INSERT INTO posts (title, image_url, content) VALUES ('$title', '$image_url', '$content')";

    if ($conn->query($sql) === TRUE) {
        echo "<center><div class='alert alert-success'>New post created successfully!</div></center>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .container { margin-top: 100px; max-width: 400px; }
        .alert { margin-top: 20px; }
        .container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
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
    </style>
</head>
<body>
<div>
<nav class="col-md-2 sidebar">
            <h4>Admin Panel</h4>
            <a href="admin_panel.php" class="active">Dashboard</a>
            <a href="create_post.php">Add New Post</a>
            <!-- <a href="manage_post.php">Manage Posts</a> -->
            <a href="view_messages.php">View Messages</a>
            <a href="logout.php">Logout</a>
        </nav>
</div>
<div class="container mt-5" center-align>

    <center>
    <h1 class="mb-4">Create New Post</h1>
    </center>
    <form method="POST" action="create_post.php">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter post title" required>
        </div>
        <div class="form-group">
            <label for="image_url">Image URL</label>
            <input type="text" class="form-control" id="image_url" name="image_url" placeholder="Enter image URL">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" placeholder="Write your post content here..." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
    </form>
</div>

<!-- Optional: Add Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-ZVP8wYy+Wgu5GJj6q7mZc7f4LxY4rVVp1I2aN2+a2aDg2Q5z1p7IBXzOvMj1fL5" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js" integrity="sha384-CPs/ZM1fW5sm5/7b+PxwqqiwkInEgaXpO9v/eEHP2jbP8tvocHH4P+lC0tczOPgG" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
