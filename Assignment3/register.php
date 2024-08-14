<!-- codes for register page -->

<?php

include_once "templates/header.php"; // add header template

include_once "config/dbconfig.php"; // database connection

$status = "";  // status holder for displaying an error message

// check user's submission
if (isset($_POST['submit'])) {

    // get user input
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // search matching record in database
    $sql1 = "select * from users where email = ?";
    $stmt1 = $pdo->prepare($sql1);
    $stmt1->execute([$email]);

    // check if there are same data existing in the database
    if ($stmt1->rowCount() == 1) {
        $status = "The member already exists";  // Set an error message

    } else {
        $sql2 = "insert into users (first_name, last_name, email, password)  
        values (:fname, :lname, :email, :password)";   // Insert new data
        $stmt2 = $pdo->prepare($sql2); 
        $stmt2->execute(
            [
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email,
                'password' => $password
            ]
        );

        $_SESSION['fname'] = $fname; // store user info
        $_SESSION['lname'] = $lname;
        $_SESSION['email'] = $email;

        header("Location: member.php"); // redirect to member page
        exit;
        
    }
}
?>

    <!-- HTML content for register page -->
    <div class = "register">
        <h1>Registration</h1>
        <h2>Please Enter Information to Signup</h2>

        <!-- The form will be submitted to the same page -->
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" required><br><br>

            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" value="Signup" name="submit">

            <input type="reset" value="Reset">
        </form>
    </div>

    <div class = "message">
        <?php echo $status ?>  <!-- display the error message -->
    </div>
    

<?php
include_once "templates/footer.php";  // add footer template
?>