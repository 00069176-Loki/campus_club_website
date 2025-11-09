<?php
// Path to store registrations
$regFile = __DIR__ . '/registrations.json';

// Load existing registrations
$registrations = file_exists($regFile) ? json_decode(file_get_contents($regFile), true) : [];

// List of events (should match events_list.php)
$events = [
    1 => "Community Cleanup",
    2 => "Food Drive",
    3 => "Tree-Planting Day",
    4 => "Charity Bake Sale",
    5 => "Neighborhood Watch Meeting",
    6 => "Blood Donation Camp",
    7 => "Art Workshop for Kids",
    8 => "Yoga in the Park",
    9 => "Community Sports Day",
    10 => "Local Talent Show"
];

// Get event ID from GET parameter
$event_id = $_GET['event_id'] ?? null;
$event_name = $event_id && isset($events[$event_id]) ? $events[$event_id] : "";

// Handle form submission
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $event_id_post = $_POST['event_id'];
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $student_id = trim($_POST['student_id']);

    if ($event_id_post && $name && $email && $student_id) {
        $registrations[] = [
            "event_id" => $event_id_post,
            "event_name" => $events[$event_id_post],
            "name" => $name,
            "email" => $email,
            "student_id" => $student_id
        ];
        file_put_contents($regFile, json_encode($registrations, JSON_PRETTY_PRINT));
        $message = "✅ Registration successful for {$events[$event_id_post]}!";
    } else {
        $message = "❌ Please fill all fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register for Event</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>


<div class="nav-banner">
    <img src="Images\campusclub.jpg" alt="banner">
</div>




<!-- Navigation (Moved Below Hero Section) -->

<nav class="main-nav" aria-label="Main navigation">

    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href=events_list.php>Events</a></li>
        <li><a href="about_us.html">About Us</a></li>
        <li><a href="contact.html">Contact</a></li>
    </ul>

</nav>



<main class="register-main-content">
    <?php if ($message): ?>
        <div class="message <?= strpos($message,'✅')!==false ? 'success' : 'error' ?>">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <?php if ($event_name): ?>
        <form method="POST">
            <p><strong>Event:</strong> <?= htmlspecialchars($event_name) ?></p>
            <input type="hidden" name="event_id" value="<?= $event_id ?>">
            <input type="text" name="name" placeholder="Your Full Name" required>
            <input type="email" name="email" placeholder="Campus Email" required>
            <input type="text" name="student_id" placeholder="Student ID" required>
            <button type="submit">Register</button>
        </form>
    <?php else: ?>
        <p>Invalid event selected. Please go back and choose an event.</p>
    <?php endif; ?>

</main>



<!-- Footer -->

<footer class="site-footer">

    <div class="footer-content">

        <!-- Left: Logo -->

        <div class="footer-left">
            <img src="img/site-logo-new.svg" alt="Campus Club logo" class="footer-logo"/>
        </div>



        <!-- Center: Footer Navigation -->

        <div class="footer-center">
            <ul class="footer-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="events_list.php">Events</a></li>
                <li><a href="about_us.html">About Us</a></li>
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
