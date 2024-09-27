<?php include('navbar.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .about-image {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .content {
            padding-left: 20px;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
        }
        h1, h2, h3 {
            color: #333;
            font-weight: bold;
        }
        p {
            color: #555;
            line-height: 1.6;
        }
        .team-card {
            margin: 10px 0;
        }
        .card-title {
            color: #007bff;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">About Us</h1>
    <div class="row">
        <div class="col-md-6">
            <img src="https://via.placeholder.com/800x400.png?text=About+Us" alt="About Us" class="about-image">
        </div>
        <div class="col-md-6 content">
            <h2>Welcome to Our Blog!</h2>
            <p>
                We are passionate about sharing our thoughts and experiences with the world. Our blog covers a wide range of topics including travel, food, technology, and personal development. 
            </p>
            <p>
                Our mission is to inspire and inform our readers through engaging content that reflects our values of creativity, integrity, and curiosity. 
            </p>
            <p>
                Founded in 2023 by Jane Doe, a travel enthusiast and freelance writer, our blog has quickly grown into a community of like-minded individuals. Jane has traveled to over 30 countries and loves sharing her insights on culture, cuisine, and adventures.
            </p>
            <h3>Meet the Team</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="card team-card">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Jane Doe">
                        <div class="card-body">
                            <h5 class="card-title">Jane Doe</h5>
                            <p class="card-text">Founder & Travel Writer</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card team-card">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="John Smith">
                        <div class="card-body">
                            <h5 class="card-title">John Smith</h5>
                            <p class="card-text">Food Blogger & Recipe Developer</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card team-card">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Emily Johnson">
                        <div class="card-body">
                            <h5 class="card-title">Emily Johnson</h5>
                            <p class="card-text">Technology Enthusiast & Reviewer</p>
                        </div>
                    </div>
                </div>
            </div>
            <p>
                Thank you for visiting our blog! We hope you find our posts enjoyable and insightful. Feel free to reach out through our <a href="contact.php">Contact Us</a> page if you have any questions or feedback.
            </p>
        </div>
    </div>
</div>

<div class="footer">
    <p>&copy; 2023 My Blog. All Rights Reserved.</p>
    <a href="index.php" class="btn btn-outline-primary">Back to Home</a>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
