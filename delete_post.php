<?php include('php/dbconfig.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Post</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light background for better contrast */
        }
        .container {
            margin-top: 50px;
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            background-color: #fff; /* White background for content area */
            padding: 30px; /* Spacing inside the container */
        }
        .alert {
            margin-bottom: 20px; /* Spacing between alerts */
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM posts WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>Post deleted successfully!</div>";
            header('Refresh: 2; url=index.php'); // Redirect after 2 seconds
        } else {
            echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>No post ID specified for deletion.</div>";
    }
    $conn->close();
    ?>
    <a href="index.php" class="btn btn-primary">Back to Posts</a>
</div>

<!-- Optional: Add Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-ZVP8wYy+Wgu5GJj6q7mZc7f4LxY4rVVp1I2aN2+a2aDg2Q5z1p7IBXzOvMj1fL5" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js" integrity="sha384-CPs/ZM1fW5sm5/7b+PxwqqiwkInEgaXpO9v/eEHP2jbP8tvocHH4P+lC0tczOPgG" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
