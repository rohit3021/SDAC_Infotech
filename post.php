<?php
include('navbar.php'); 
include('php/dbconfig.php'); 

if (!isset($_GET['id'])) {
    echo "No post found!";
    exit;
}

$id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $post = $result->fetch_assoc();
} else {
    echo "Post not found!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($post['title']); ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-4">
    <h1><?php echo htmlspecialchars($post['title']); ?></h1>
    <?php if ($post['image_url']): ?>
        <img class="img-fluid" src="<?php echo $post['image_url']; ?>" alt="Post Image">
    <?php endif; ?>
    <p class="mt-3"><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
    <a href="update_post.php?id=<?php echo $post['id']; ?>" class="btn btn-warning">Edit</a>
    <a href="delete_post.php?id=<?php echo $post['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
    <a href="index.php" class="btn btn-secondary">Back to Blog</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php $conn->close(); ?>
