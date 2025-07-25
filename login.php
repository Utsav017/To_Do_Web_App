<?php
require 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password_hash FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($user_id, $hash);
    $stmt->fetch();

    if ($user_id && password_verify($password, $hash)) {
        $_SESSION['user_id'] = $user_id;

        // ✅ Redirect to to-do app
        header("Location: index.php");
        exit();
    } else {
        http_response_code(401);
        echo "Invalid username or password";
    }
}
