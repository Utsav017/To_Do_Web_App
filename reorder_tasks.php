<?php
require 'db.php';
session_start();

// Check user authentication
if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    echo json_encode(["error" => "Not logged in"]);
    exit();
}

$user_id = $_SESSION['user_id'];

// Decode JSON input
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data["ids"]) && isset($data["date"])) {
    $ids = $data["ids"];
    $date = $conn->real_escape_string($data["date"]);

    foreach ($ids as $position => $id) {
        $id = intval($id);

        // Only update tasks belonging to the logged-in user
        $conn->query("UPDATE tasks 
                      SET position = $position, deadline = '$date' 
                      WHERE id = $id AND user_id = $user_id");
    }

    echo json_encode(["success" => true]);
} else {
    http_response_code(400);
    echo json_encode(["error" => "Invalid data"]);
}
