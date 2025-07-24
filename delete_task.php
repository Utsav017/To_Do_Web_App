<?php
require 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $conn->query("DELETE FROM tasks WHERE id = $id");
}
