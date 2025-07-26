<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="min-height:100vh;display:flex;flex-direction:column;">
    <div style="
  display: flex;
  justify-content: flex-end;
  padding: 16px;
">
        <a href="logout.php" style="
    background: #e74c3c;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 8px;
    font-weight: 500;
    transition: background 0.3s ease;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
  " onmouseover="this.style.background='#c0392b'" onmouseout="this.style.background='#e74c3c'">
            🚪 Logout
        </a>
    </div>

    <button onclick="toggleTheme()" style="position:absolute; top:20px; left:20px;">🌓</button>

    <div class="container">
        <h1>📝 My To-Do List</h1>
        <section>
            <form id="taskForm">
                <input type="text" id="taskInput" placeholder="Enter new task" required>

                <select id="categoryInput">
                    <option value="Work">Work</option>
                    <option value="Study">Study</option>
                    <option value="Personal">Personal</option>
                </select>

                <select id="priorityInput">
                    <option value="High">🔥 High</option>
                    <option value="Medium" selected>⚖️ Medium</option>
                    <option value="Low">🌱 Low</option>
                </select>

                <input type="date" id="deadlineInput" required>

                <input type="text" id="rewardInput" placeholder="🎉 Reward (optional)">

                <button type="submit">Add Task</button>
            </form>
        </section>
        <ul id="taskList"></ul>
    </div>

    <script src="script.js"></script>
    <div id="toast-container"></div>
    
    <footer class="main-footer">
    This Web App is created by <strong>Shivansh Gupta</strong>
    <a href="https://www.linkedin.com/in/shivansh-gupta017/" target="_blank" title="LinkedIn" style="margin-left:8px;">
      <i class="fa-brands fa-linkedin"></i>
    </a>
    <a href="https://github.com/Utsav017" target="_blank" title="GitHub" style="margin-left:8px;">
      <i class="fa-brands fa-github"></i>
    </a>
  </footer>
    
</body>

</html>