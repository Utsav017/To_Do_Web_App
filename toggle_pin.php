<?php
require 'db.php';
if (isset($_POST['id']) && isset($_POST['status'])) {
    $id = intval($_POST['id']);
    $status = intval($_POST['status']);
    $conn->query("UPDATE tasks SET status = $status WHERE id = $id");
}
