<?php
require 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    exit("Not logged in");
}

$user_id = $_SESSION['user_id'];

$task = $_POST['task'];
$category = $_POST['category'];
$deadline = $_POST['deadline'];
$priority = $_POST['priority'];
$reward = $_POST['reward'];

$stmt = $conn->prepare("INSERT INTO tasks (task, category, deadline, priority, reward, user_id) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssi", $task, $category, $deadline, $priority, $reward, $user_id);
$stmt->execute();
