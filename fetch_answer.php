<?php
$servername = "sql110.thsite.top";
$username = "thsi_37098187";
$password = "yB7oHlIu";
$database = "thsi_37098187_database1";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT answer FROM answers WHERE question_id = ? ORDER BY timestamp DESC LIMIT 1";

$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("i", $question_id);
    $stmt->execute();
    $stmt->bind_result($last_answer);
    $stmt->fetch();
    $stmt->close();
} else {
    echo "Failed to prepare statement: " . $conn->error;
}

$conn->close();

// Return the answer
echo $last_answer;
?>
