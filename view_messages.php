
<?php include('php/dbconfig.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Messages</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .wrapper {
            display: flex;
            width: 100%;
        }
        /* Sidebar */
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
        /* Page Content */
        .content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }
        .content h1 {
            margin-bottom: 30px;
        }
        .table-striped {
            background-color: #fff;
            border: 1px solid #ddd;
        }
        .table-striped th, .table-striped td {
            padding: 12px;
            text-align: center;
        }
        .table-striped th {
            background-color: #007bff;
            color: #fff;
        }
        .table-striped tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        @media screen and (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .sidebar a {
                float: left;
            }
            .content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

<div class="wrapper">

    <!-- Sidebar -->
    <nav class="sidebar">
    <h4>Admin Panel</h4>
        <a href="admin_panel.php" class="active">Dashboard</a>
        <!-- <a href="manage_post.php">Manage Posts</a> -->
        <a href="view_messages.php">View Messages</a>
        <a href="create_post.php">Add New posts</a>
        <a href="logout.php">Logout</a>
    </nav>

    <!-- Page Content -->
    <div class="content">
        <h1>Messages from Contact Form</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM messages ORDER BY created_at DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['name']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['subject']}</td>
                                <td>{$row['message']}</td>
                                <td>{$row['created_at']}</td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No messages found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php include('footer.php'); ?>
</body>
</html>
