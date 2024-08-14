<!-- codes for index page -->

<?php
session_start(); // use session to store the login status

include_once "templates/header.php"; // add header template

include_once "config/dbconfig.php"; // database connection

$status = "";  // status holder for displaying an error message

// check user's submission
if (isset($_POST['submit'])) {

    // get user input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // search matching record in database
    $sql = "select * from users where email = :email and password = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(
        [
            'email' => $email,
            'password' => $password
        ]
    );

    // check if there are same data existing in the database
    if ($stmt->rowCount() == 1) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch user data

        $_SESSION['email'] = $user['email']; // Store email
        $_SESSION['username'] = $user['first_name'] . ' ' . $user['last_name']; // Store User name
        $_SESSION['loggedin'] = true; // store login status

        header("Location: member.php"); // redirect to member page when logged in
        exit;

    } else {
        $status = "Invalid email or password";  // Set error message
    }
}
?>
    <!-- HTML content for index page -->

    <!-- welcome message -->
    <div class="welcome">
        <h1>Welcome to our Project!</h1>
        <p>This assignment demonstrates HTML5 valid form elements, PHP, and MySQL. <br>
            The topics include OOPS, methods, form validation, conditional statements, debugging, session, and PDO SQL statements to demonstrate simple CRUD operations. <br>
            This is a simple website that contains public pages for all users (visitors) and private pages for members only (registered users).
        </p>
    </div>

    <!-- forms section displayed only when not logged in -->
    <?php if (!isset($_SESSION['loggedin'])): ?>
        <div class="login">
            <h2>If you are already a member, you can login now to access Users Page:</h2>

            <!-- The form will be submitted to the same page -->
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>   <!-- Verify that both input boxes (email and password) are not empty by "required" -->
                                                                                <!-- Verify that email address matches the normal email pattern: -->
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br><br>

                <input type="submit" value="Login" name="submit">

                <input type="reset" value="Reset">
            </form>

            <p>You can <a href="register.php">register</a> for free to enroll yourself in our website.</p>
        </div>

        <div class="message">
            <?php echo $status ?> <!-- display the error message -->
        </div>
    <?php endif; ?>

<?php
include_once "templates/footer.php";   // add footer template
?> 
