<?php
require 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data["ids"]) && isset($data["date"])) {
    $ids = $data["ids"];
    $date = $conn->real_escape_string($data["date"]);

    foreach ($ids as $position => $id) {
        $id = intval($id);
        $conn->query("UPDATE tasks SET position = $position, deadline = '$date' WHERE id = $id");
    }
}
