<?php
session_start(); // Start session to check login status
include('navbar.php'); // Include the navbar
include('php/dbconfig.php'); // Include database configuration

// Check if the user is logged in
$is_logged_in = isset($_SESSION['user_id']); // Check if the user_id is set in session
// $is_logged_in = isset($_SESSION['admin_id']); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .card {
            border-radius: 10px;
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .card-text {
            font-size: 0.9rem;
        }
        .container {
            padding-top: 20px;
        }
    </style>
</head>
<body>

<div class="container my-4">
    <h1 class="text-center mb-4">Latest Blog Posts</h1>
    <div class="row">
        <?php
        // Fetch blog posts from the database
        $sql = "SELECT * FROM posts ORDER BY created_at DESC";
        $result = $conn->query($sql);

        // Initialize a counter for posts
        $post_count = 0;

        if ($result->num_rows > 0) {
            // Loop through each post and display it in a card
            while ($row = $result->fetch_assoc()) {
                // Display only 6 posts if the user is not logged in
                if (!$is_logged_in && $post_count >= 6) {
                    break; // Stop loop after 6 posts
                }

                // Display each post
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <?php if ($row['image_url']): ?>
                            <img class="card-img-top" src="<?php echo $row['image_url']; ?>" alt="Post Image">
                        <?php else: ?>
                            <img class="card-img-top" src="https://via.placeholder.com/200" alt="Default Image">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars(substr($row['content'], 0, 100)); ?>...</p>
                            <a href="post.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <?php
                $post_count++; // Increment the post count
            }
        } else {
            echo "<p>No posts found.</p>";
        }
        ?>
    </div>

    <?php if ($result->num_rows > 6 && !$is_logged_in): ?>
        <div class="text-center mt-4">
            <a href="login_user.php" class="btn btn-primary">View More</a>
        </div>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php include('footer.php'); ?>
</body>
</html>

<?php $conn->close(); ?>