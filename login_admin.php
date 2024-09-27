<?php include('navbar.php'); ?>
<?php
session_status(); // Start a session
include('php/dbconfig.php'); // Include your database configuration

// Check if the user is already logged in
// if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
//     header('location: create_post.php'); // Redirect to create post if logged in
//     exit;
// }

// Initialize variables
$username = '';
$password = '';
$login_error = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the SQL statement
    $sql = "SELECT * FROM admins WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username); // Bind the username parameter
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        // Verify the password against the hashed password in the database
        if (password_verify($password, $row['password'])) {
            // Store data in session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header('location: admin_panel.php'); // Redirect to create post
            exit;
        } else {
            $login_error = 'Invalid username or password.';
        }
    } else {
        $login_error = 'Invalid username or password.';
    }

    // Close the statement
    $stmt->close();
}

$conn->close(); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center">Admin Login</h2>
    <form method="POST" action="login_admin.php">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
        <div class="text-center mt-3">
        <small>Don't have an account? <a href="register_admin.php">Log In</a></small>
    </div>
    </form>
    <?php if ($login_error): ?>
        <div class="alert alert-danger" role="alert"><?php echo $login_error; ?></div>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php include('footer.php'); ?>
</body>
</html>
