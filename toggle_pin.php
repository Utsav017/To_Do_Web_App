<?php
require 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    exit("Not logged in");
}

$user_id = $_SESSION['user_id'];
$task_id = intval($_POST['id']);
$pinned = intval($_POST['pinned']);

$stmt = $conn->prepare("UPDATE tasks SET pinned = ? WHERE id = ? AND user_id = ?");
$stmt->bind_param("iii", $pinned, $task_id, $user_id);
$stmt->execute();
