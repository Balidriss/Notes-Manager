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
    $delete_user_stmt->bindValue(1, $inactive_time_threshold, PDO::PARAM_INT);


    $delete_user_stmt->execute();


    echo "Successfully deleted inactive users.\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
