<!-- HTML code for the header  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Final Assignment</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Final Assignment</h1>
        <h3>User's Info Using PHP with MySQL</h3>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <!-- modify nav list depends on loggedin status -->
            <?php
            if (isset($_SESSION['loggedin'])) {  # for when user logged in
                echo '<li><a href="member.php">Member</a></li>';
                echo '<li><a href="logout.php">Logout</a></li>';

            } else {                            # for when user haven't logged in
                echo '<li><a href="register.php">Register</a></li>';    
                echo '<li><a href="index.php">Login</a></li>';
            }
            ?>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
    
    <main>