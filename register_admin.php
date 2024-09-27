<?php include('navbar.php'); ?>
<?php
session_status();
include('php/dbconfig.php'); // Include your database configuration

// Initialize variables
$username = '';
$password = '';
$registration_error = '';
$registration_success = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username already exists
    $check_sql = "SELECT * FROM admins WHERE username = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $username);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        $registration_error = "Username already exists. Please choose another one.";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert admin data into the database
        $sql = "INSERT INTO admins (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $hashed_password);

        if ($stmt->execute()) {
            $registration_success = "Admin registered successfully!";
            $username = ''; // Reset username after registration
        } else {
            $registration_error = "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }

    // Close the check statement
    $check_stmt->close();
}

$conn->close(); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .container { margin-top: 100px; max-width: 400px; }
        .alert { margin-top: 20px; }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center">Admin Registration</h2>
    <form method="POST" action="register_admin.php">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Register</button>
        <div class="text-center mt-3">
        <small>Already have an account? <a href="login_admin.php">Log In</a></small>
    </div>
    </form>
    <?php if ($registration_error): ?>
        <div class="alert alert-danger" role="alert"><?php echo $registration_error; ?></div>
    <?php endif; ?>
    <?php if ($registration_success): ?>
        <div class="alert alert-success" role="alert"><?php echo $registration_success; ?></div>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php include('footer.php'); ?>
</body>
</html>
