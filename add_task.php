<?php
require 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task'])) {
    $task = $conn->real_escape_string($_POST['task']);
    $category = $conn->real_escape_string($_POST['category'] ?? 'General');
    $deadline = $conn->real_escape_string($_POST['deadline'] ?? null);
    $priority = $conn->real_escape_string($_POST['priority'] ?? 'Medium');

    $sql = "INSERT INTO tasks (task, category, deadline, priority) 
            VALUES ('$task', '$category', '$deadline', '$priority')";
    $conn->query($sql);
}
