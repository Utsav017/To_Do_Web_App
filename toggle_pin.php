<?php
require 'db.php';

if (isset($_POST['id']) && isset($_POST['pinned'])) {
    $id = intval($_POST['id']);
    $pinned = intval($_POST['pinned']);
    $conn->query("UPDATE tasks SET pinned = $pinned WHERE id = $id");
}
