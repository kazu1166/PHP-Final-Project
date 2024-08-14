<!-- codes for contact page -->

<?php
session_start(); // use session to store the login status

include_once "templates/header.php"; // add header template
?>

    <!-- HTML content for contact page -->
    <div class = "contact">
        <h1>Contact form</h1>

        <!-- The form will be submitted to the same page -->
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
            
            <input type="submit" value="Submit" name="submit">

            <input type="reset" value="Reset">
        </form>
    </div>

<?php
include_once "templates/footer.php";  // add footer template
?>