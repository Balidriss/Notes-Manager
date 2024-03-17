<?php
//cron job for automatic data deletion (delete user  with paring foreign key)


$host = "";
$dbname = "";
$username = "";
$password = "";


$inactive_time_threshold = 10;

try {

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $delete_user_query = "DELETE FROM users WHERE created_at < (NOW() - INTERVAL ? MINUTE)";
    $delete_user_stmt = $conn->prepare($delete_user_query);
    $delete_messages_query = "DELETE FROM messages";
    $delete_messages_stmt = $conn->prepare($delete_messages_query);
    $delete_messages_stmt->execute();
    $delete_user_stmt->execute();


    echo "Delete query attempted.\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
