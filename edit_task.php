<?php
require 'db.php';
if (isset($_POST['id']) && isset($_POST['task'])) {
    $id = intval($_POST['id']);
    $task = $conn->real_escape_string($_POST['task']);
    $conn->query("UPDATE tasks SET task = '$task' WHERE id = $id");
}
