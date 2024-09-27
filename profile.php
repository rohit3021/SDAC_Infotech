<?php
session_start(); // Start the session to access user data

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page
    header('Location: login_user.php');
    exit();
}

// Include the database configuration (optional if you want to fetch additional user data)
include('php/dbconfig.php');

// Fetch user details from the database
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .profile-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .profile-pic {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }
        h1 {
            color: #007bff;
        }
        .btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<?php include('navbar.php'); ?> <!-- Include navbar -->

<div class="profile-container text-center">
    <h1>User Profile</h1>
    <!-- Display user profile picture -->
    <img src="https://via.placeholder.com/150" alt="Profile Picture" class="profile-pic">
    
    <h3><?php echo htmlspecialchars($_SESSION['user_id']); ?></h3>
    <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
    
    <a href="edit_profile.php" class="btn btn-primary">Edit Profile</a>
    <a href="logout.php" class="btn btn-danger">Logout</a>
</div>

<!-- Include Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php include('footer.php'); ?> <!-- Include footer -->
</body>
</html>

<?php $conn->close(); ?> <!-- Close the database connection -->
