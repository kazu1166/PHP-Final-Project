<!-- codes for member page -->

<?php
session_start(); // use session to store the login status

// check user's submission
if (!isset($_SESSION['loggedin'])) {
    header("Location: index.php"); // redirect to home page when user doesn't login
    exit;
}

include_once "templates/header.php"; // add header template

include_once "config/dbconfig.php"; // database connection

?>


<h1>Welcome to our Members Page</h1>
<h2>This page is only for our clients!</h2>

<p>Username: <?php echo $_SESSION['username'] ?></p>   <!-- Display user data depending on the login data -->
<p>Email: <?php echo $_SESSION['email'] ?></p> <br>

<img src="images/members.jpg" alt="members">

<?php
include_once "templates/footer.php";   // add footer template
?>