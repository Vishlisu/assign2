<?php
// Database connection
$conn = new mysqli('localhost', 'username', 'password', 'database');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if attempts table exists, if not, create it
$sql = "CREATE TABLE IF NOT EXISTS attempts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    datetime DATETIME DEFAULT CURRENT_TIMESTAMP,
    firstname VARCHAR(30), 
    lastname VARCHAR(30),
    studentid VARCHAR(10),
    attempt_num TINYINT,
    score INT
)";

if ($conn->query($sql) === FALSE) {
    die("Error creating table: " . $conn->error);
}

// Sanitize and validate form data
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$studentid = mysqli_real_escape_string($conn, $_POST['studentid']);

// More validation...
if (!preg_match("/^[a-zA-Z\s-]{1,30}$/", $firstname) || 
    !preg_match("/^[a-zA-Z\s-]{1,30}$/", $lastname) || 
    !preg_match("/^\d{7}$|^\d{10}$/", $studentid)) {
    die("Invalid input data.");
}

// Calculate score
$score = 0;
// Logic to calculate score...

// Check if user has < 2 attempts
$sql = "SELECT COUNT(*) as count FROM attempts WHERE studentid = '$studentid'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$attempt_count = $row['count'];

if ($attempt_count < 2) {
    // Insert new attempt record
    $sql = "INSERT INTO attempts (firstname, lastname, studentid, attempt_num, score) 
            VALUES ('$firstname', '$lastname', '$studentid', $attempt_count + 1, $score)";
            
    if ($conn->query($sql) === TRUE) {
        // Display success page
        echo "<h3>Quiz Attempt Stored</h3>";
        echo "<p>Name: $firstname $lastname</p>";
        echo "<p>Student ID: $studentid</p>";
        echo "<p>Score: $score</p>";
        echo "<p>Attempt: " . ($attempt_count + 1) . "</p>";
        
        if ($attempt_count == 0) {
            echo "<p><a href='quiz.php'>Re-attempt Quiz</a></p>";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "<h3>You have exhausted all attempts</h3>";
}

$conn->close();
?>
