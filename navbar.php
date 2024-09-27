<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session if it hasn't been started
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .navbar:hover {
            background-color: #343a40; /* Darker background on hover */
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.7rem;
            color: #ffc107;
        }
        .navbar-brand:hover {
            color: #ffdd57;
        }
        .nav-link {
            color: #ffffff;
        }
        .nav-link:hover {
            color: #ffc107;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }
        .dropdown-menu {
            background-color: #f8f9fa;
            border-radius: 0.5rem;
        }
        .dropdown-item {
            color: #495057;
        }
        .dropdown-item:hover {
            background-color: #e9ecef;
            color: #343a40;
        }
        .user-profile {
            font-size: 0.9rem;
            color: #ffffff;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <a class="navbar-brand" href="index.php">My Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle user-profile" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <?php echo "User: " . htmlspecialchars($_SESSION['user_id']); ?>
                    <?php else: ?>
                        User
                    <?php endif; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a class="dropdown-item" href="profile.php">Profile</a>
                        <!-- <a class="dropdown-item" href="profile_settings.php">Account Setting</a> -->
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    <?php else: ?>
                        <a class="dropdown-item" href="login_user.php">Login</a>
                        <a class="dropdown-item" href="register_user.php">Register</a>
                    <?php endif; ?>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle admin-profile" href="#" id="adminDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php if (isset($_SESSION['admin_id'])): ?>
                        <?php echo "Admin: " . htmlspecialchars($_SESSION['admin_id']); ?>
                    <?php else: ?>
                        Admin
                    <?php endif; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminDropdown">
                    <?php if (isset($_SESSION['admin_id'])): ?>
                        <a class="dropdown-item" href="admin_dashboard.php">Dashboard</a>
                        <a class="dropdown-item" href="logout.php">Logout</a> <!-- Admin Logout -->
                    <?php else: ?>
                        <a class="dropdown-item" href="login_admin.php">Admin Login</a>
                        <!-- <a class="dropdown-item" href="register_admin.php">Admin Register</a> -->
                    <?php endif; ?>
                </div>
            </li>
        </ul>
    </div>
</nav>

<!-- Scripts should be at the end of the body -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>



