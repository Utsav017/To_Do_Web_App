<?php
require 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    exit("Not logged in");
}

$user_id = $_SESSION['user_id'];
$task_id = intval($_POST['id']);
$task_text = $_POST['task'];

$stmt = $conn->prepare("UPDATE tasks SET task = ? WHERE id = ? AND user_id = ?");
$stmt->bind_param("sii", $task_text, $task_id, $user_id);
$stmt->execute();
