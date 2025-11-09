<?php
// ---- PHP validation ----
$name = $email = $phone = $programme = $interest = "";
$year = [];
$errors = [];
$successMessage = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = trim($_POST["name"]);
  $email = trim($_POST["email"]);
  $phone = trim($_POST["phone"]);
  $programme = trim($_POST["programme"]);
  $interest = trim($_POST["interest"]);
  $year = isset($_POST["year"]) ? $_POST["year"] : [];

  if (empty($name) || empty($email) || empty($programme) || empty($year)) {
    $errors[] = "Please fill all fields.";
}

  if (empty($errors)) {
    $successMessage = "🎉 Congratulations! Welcome to the Club. Please check your e-mail for the verification email.";
  }

  if (empty($errors) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $successMessage = "🎉 Congratulations! Welcome to the Club. Please check your e-mail for the verification email.";

    // Clear form variables so fields will be empty
    $name = $email = $phone = $programme = $interest = "";
    $year = [];
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Us - Campus Club</title>
  <link rel="stylesheet" href="css/style.css" />
  <script src="https://kit.fontawesome.com/96e67bb0d3.js" crossorigin="anonymous"></script>

  <style>
    /* --- Popup Modal Styles --- */
    .popup-overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.6);
      justify-content: center;
      align-items: center;
      z-index: 9999;
    }

    .popup {
      background: #fff;
      border-radius: 12px;
      padding: 2rem;
      max-width: 400px;
      text-align: center;
      box-shadow: 0 0 15px rgba(0,0,0,0.3);
      animation: fadeIn 0.3s ease-in-out;
    }

    .popup.success { border: 2px solid #32cd32; }
    .popup.error { border: 2px solid #ff5555; }

    .popup button {
      margin-top: 1rem;
      padding: 0.6rem 1.2rem;
      border: none;
      border-radius: 6px;
      background: #4CAF50;
      color: #fff;
      cursor: pointer;
      font-weight: bold;
    }

    @keyframes fadeIn {
      from {opacity: 0; transform: scale(0.9);}
      to {opacity: 1; transform: scale(1);}
    }
  </style>
</head>

<body>
  <!-- Navigation Banner -->
  <div class="nav-banner">
    <img src="Images/campusclub.jpg" alt="banner">
  </div>

  <!-- Navigation -->
  <nav class="main-nav" aria-label="Main navigation">
    <ul class="nav-links">
      <li><a href="index.php">Home</a></li>
      <li><a href="events_list.php">Events</a></li>
      <li><a href="about_us.html">About Us</a></li>
      <li><a href="contact.php" class="active">Contact</a></li>
    </ul>
  </nav>

  <!-- CONTACT PAGE HEADER -->
  <section class="contact-header">
    <div class="contact-header-content">
      <p class="contact-small">Contact Us</p>
      <h1 class="contact-large">
        Do you want to <a href="#join-form" class="join-link">Join A Team</a>, 
        Make a Recommendation or just say “Hi!”<br>
        We’d love to hear from you.
      </h1>
    </div>
  </section>

  <!-- Divider -->
  <div class="short-divider"></div>

  <!-- CONTACT SECTION -->
  <section class="contact-section">
    <div class="contact-container">
      <div class="contact-left">
        <p>
          We're just one click away from helping you discover your love for a new activity.  
          Fill in the form to share more details about yourself and your interests.
        </p>
      </div>

      <div class="contact-right" id="join-form">
        <form class="contact-form" method="POST" action="">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" value="<?= htmlspecialchars($name) ?>">

          <label for="email">Email:</label>
          <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>">

          <label for="phone">Phone Number:</label>
          <input type="tel" id="phone" name="phone" value="<?= htmlspecialchars($phone) ?>">

          <label for="programme">Programme of Study:</label>
          <input type="text" id="programme" name="programme" value="<?= htmlspecialchars($programme) ?>">

          <fieldset class="checkbox-group">
            <legend>Academic Year:</legend>
            <?php
            $options = ["Freshman", "Sophomore", "Junior", "Senior", "Staff"];
            foreach ($options as $opt) {
              $checked = in_array($opt, $year) ? "checked" : "";
              echo "<label><input type='checkbox' name='year[]' value='$opt' $checked> $opt</label>";
            }
            ?>
          </fieldset>

          <label for="interest">Extracurricular Interest:</label>
          <textarea id="interest" name="interest" rows="4"><?= htmlspecialchars($interest) ?></textarea>

          <button type="submit" class="submit-btn">Submit</button>
        </form>
      </div>
    </div>
  </section>

  <!-- POPUP OVERLAY -->
  <div id="popup-overlay" class="popup-overlay">
    <div id="popup-box" class="popup">
      <p id="popup-message"></p>
      <button id="popup-btn">OK</button>
    </div>
  </div>

  <!-- FOOTER -->
  <footer class="site-footer">
    <div class="footer-content">
      <div class="footer-left">
        <img src="Images/logo.png" alt="Campus Club logo" class="footer-logo"/> 
      </div>

      <div class="footer-center">
        <ul class="footer-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="events_list.php">Events</a></li>
                <li><a href="about_us.html">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
        </ul>
      </div>

      <div class="footer-right">
        <ul class="social-links">
          <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
          <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
          <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
        </ul>
      </div>
    </div>

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

  <!-- Pass PHP validation result to JS -->
  <script>
    const formStatus = {
      errors: <?= json_encode($errors) ?>,
      success: <?= json_encode($successMessage) ?>
    };
  </script>

  <!-- External JS file -->
  <script src="js/contact.js"></script>
</body>
</html>
