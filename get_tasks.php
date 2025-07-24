<?php
require 'db.php';
$result = $conn->query("SELECT * FROM tasks ORDER BY deadline DESC, pinned DESC, position ASC");

$tasks = [];
while ($row = $result->fetch_assoc()) {
    $tasks[] = $row;
}
echo json_encode($tasks);
