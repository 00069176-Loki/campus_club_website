<?php
$events = [
    ["id" => 1, "title" => "Community Cleanup", "date" => "2025-11-10", "location" => "St. James Park", "club" => "Environmental Club"],
    ["id" => 2, "title" => "Food Drive", "date" => "2025-11-12", "location" => "Youth Centre", "club" => "Social Service Club"],
    ["id" => 3, "title" => "Tree-Planting Day", "date" => "2025-11-15", "location" => "Savannah Grounds", "club" => "Environmental Club"],
    ["id" => 4, "title" => "Charity Bake Sale", "date" => "2025-11-17", "location" => "Community Hall", "club" => "Culinary Club"],
    ["id" => 5, "title" => "Neighborhood Watch Meeting", "date" => "2025-11-18", "location" => "Local Library", "club" => "Safety Club"],
    ["id" => 6, "title" => "Blood Donation Camp", "date" => "2025-11-20", "location" => "City Clinic", "club" => "Health Club"],
    ["id" => 7, "title" => "Art Workshop for Kids", "date" => "2025-11-21", "location" => "Art Studio", "club" => "Arts Club"],
    ["id" => 8, "title" => "Yoga in the Park", "date" => "2025-11-23", "location" => "Central Park", "club" => "Fitness Club"],
    ["id" => 9, "title" => "Community Sports Day", "date" => "2025-11-25", "location" => "Sports Complex", "club" => "Sports Club"],
    ["id" => 10, "title" => "Local Talent Show", "date" => "2025-11-28", "location" => "Town Hall", "club" => "Performing Arts Club"]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Campus Club Events</title>

    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="nav-banner">
    <img src="Images\campusclub.jpg" alt="banner">
</div>




<!-- Navigation -->

<nav class="main-nav" aria-label="Main navigation">

    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="events_list.php">Events</a></li>
        <li><a href="about_us.html">About Us</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul>

</nav>




<main class="main-content">
    <?php foreach ($events as $event): ?>
        <div class="event-card">
            <h2><?= htmlspecialchars($event['title']) ?></h2>
            <p><strong>Date:</strong> <?= htmlspecialchars($event['date']) ?></p>
            <p><strong>Location:</strong> <?= htmlspecialchars($event['location']) ?></p>
            <p><strong>Organizing Club:</strong> <?= htmlspecialchars($event['club']) ?></p>
            <a class="register-btn" href="register.php?event_id=<?= $event['id'] ?>">Register</a>
        </div>
    <?php endforeach; ?>

</main>


<!-- Footer -->

<footer class="site-footer">

    <div class="footer-content">

        <!-- Left: Logo -->

        <div class="footer-left">
            <img src="Images/logo.png" alt="Campus Club logo" class="footer-logo"/> 
        </div>



        <!-- Center: Footer Navigation -->

        <div class="footer-center">
            <ul class="footer-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="events_list.php">Events</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>



        <!-- Right: Social Links -->

        <div class="footer-right">
            <ul class="social-links">
                <li><a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a></li>
                <li><a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="#" aria-label="X"><i class="fa-brands fa-x-twitter"></i></a></li>
                <li><a href="#" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a></li>
            </ul>
        </div>



    </div>



    <!-- Footer Bottom -->

    <div class="footer-bottom">
        <div class="footer-bottom-left">
            <a href="#" class="footer-link">Privacy Policy</a>
            <span class="divider">|</span>
            <a href="#" class="footer-link">Terms of Service</a>
        </div>

        <div class="footer-bottom-right">
            <p>© 2025 Campus Club. All Rights Reserved.</p>
        </div>
    </div>

</footer>


</body>
</html>
