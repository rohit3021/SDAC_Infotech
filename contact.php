<?php include('navbar.php'); ?>
<?php include('php/dbconfig.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f9;
            font-family: Arial, sans-serif;
        }
        .contact-section {
            padding: 60px 0;
        }
        .contact-info {
            background-color: #343a40;
            color: #fff;
            padding: 30px;
            border-radius: 8px;
        }
        .contact-info h5 {
            color: #ffc107;
        }
        .contact-form {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            width: 100%;
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .map-container {
            margin-top: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        .map-container iframe {
            width: 100%;
            height: 400px;
            border: none;
        }
    </style>
</head>
<body>

<div class="container contact-section">
    <div class="row">
        <!-- Contact Info -->
        <div class="col-md-4">
            <div class="contact-info">
                <h5>Contact Information</h5>
                <p><strong>Address:</strong> 123 Main Street, Anytown, USA</p>
                <p><strong>Phone:</strong> +1 123 456 7890</p>
                <p><strong>Email:</strong> contact@myblog.com</p>
                <p><strong>Business Hours:</strong> Mon - Fri: 9 AM - 5 PM</p>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="col-md-8">
            <div class="contact-form">
                <h5>Get in Touch</h5>
                <form method="POST" action="contact.php">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>

                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Fetch form values
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $subject = $_POST['subject'];
                    $message = $_POST['message'];

                    // Insert into the database
                    $sql = "INSERT INTO messages (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

                    if ($conn->query($sql) === TRUE) {
                        echo "<div class='alert alert-success mt-4'>Message sent successfully!</div>";
                    } else {
                        echo "<div class='alert alert-danger mt-4'>Error: " . $conn->error . "</div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Dummy Map Location -->
    <div class="row map-container mt-5">
        <div class="col-12">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509455!2d144.95373631550496!3d-37.816279179751774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d43f4f8c107%3A0x5045675218ce6e0!2sVictoria%20St%2C%20Melbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2sus!4v1611819036540!5m2!1sen!2sus"
                allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php include('footer.php'); ?>
</body>
</html>
