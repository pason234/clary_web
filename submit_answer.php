<?php
$servername = "sql110.thsite.top";
$username = "thsi_37098187";
$password = "yB7oHlIu";
$database = "thsi_37098187_database1";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question_id = $_POST['question_id'];
    $answer = $_POST['answer'];

    if (!empty($question_id) && !empty($answer)) {
        $stmt = $conn->prepare("INSERT INTO answers (question_id, answer) VALUES (?, ?)");
        $stmt->bind_param("is", $question_id, $answer);

        if ($stmt->execute()) {
            header("Location: index.html");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Please provide both question ID and answer.";
    }
}

$conn->close();
?>