<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task'])) {
    $task = $_POST['task'];
    $category = $_POST['category'] ?? 'General';
    $deadline = $_POST['deadline'] ?? null;
    $priority = $_POST['priority'] ?? 'Medium';
    $reward = $_POST['reward'] ?? null; // ✅ optional

    $stmt = $conn->prepare("INSERT INTO tasks (task, category, deadline, priority, reward) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $task, $category, $deadline, $priority, $reward);
    $stmt->execute();
    $stmt->close();
}
