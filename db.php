<?php
$conn = new mysqli("localhost", "Shivansh", "admin123", "todo_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
