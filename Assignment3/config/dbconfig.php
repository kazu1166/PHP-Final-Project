<!-- codes for database configuration -->
 
<?php
$host='localhost';
$dbname='php_assignment';
$user='root';
$password='';
$dsn="mysql:host=$host;dbname=$dbname";  # ;port=3307  when you use other port number 

try {
    $pdo = new PDO ($dsn, $user, $password);

// If there is an error in database connection, this message will be printed
} catch (PDOException $e) {
    echo "Database Connection Failed: ". $e->getMessage();
}