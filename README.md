# ✅ Modern To-Do List Web App

A clean, responsive, and feature-rich To-Do List web application built using **HTML**, **CSS**, **JavaScript**, **PHP**, and **MySQL**.

---

## 🌟 Features

- ✅ Add, edit, delete tasks
- 🔁 Drag & drop task reordering (across days)
- 📅 Deadline-based grouping (Today, Yesterday, Date)
- 🏷️ Task priorities: High, Medium, Low
- 🗂️ Task categories (Work, Study, Personal)
- 📌 Pin/unpin important tasks
- ✅ Task completion with styled checkbox and line-through
- 🎉 Optional reward after completion
- 🌗 Dark mode toggle
- 🔔 Toast notification on task completion

---

## 📸 UI Preview

> <img width="1600" height="711" alt="image" src="https://github.com/user-attachments/assets/3c3e9066-8d7f-43ce-8737-efe595749000" />

---

## 📁 Folder Structure

```

📦 todo-list-app/
│
├── index.html              # Main interface
├── style.css               # All styles (light + dark mode)
├── script.js               # Handles all UI and logic
├── db.php                  # MySQL connection
├── add\_task.php            # Adds new task
├── delete\_task.php         # Deletes a task
├── edit\_task.php           # Edits task name
├── get\_tasks.php           # Returns all tasks (JSON)
├── reorder\_tasks.php       # Updates task order
├── toggle\_pin.php          # Pins/unpins tasks
├── update\_status.php       # Marks task complete/incomplete

````

---

## 🛠️ Technologies Used

- Frontend: HTML5, CSS3, Vanilla JavaScript
- Backend: PHP 7+
- Database: MySQL
- Drag-and-drop: [SortableJS](https://sortablejs.github.io/Sortable/)
- Toasts: Custom lightweight implementation

---

## 📦 Setup Instructions

### 1. Clone or Download the Project
```bash
git clone https://github.com/Utsav017/to_do_web_app.git
````

### 2. Import the SQL Table

```sql
CREATE DATABASE todo_db;

USE todo_db;

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    task TEXT NOT NULL,
    category VARCHAR(50),
    deadline DATE,
    priority VARCHAR(10) DEFAULT 'Medium',
    reward VARCHAR(255),
    status TINYINT DEFAULT 0,
    pinned TINYINT DEFAULT 0,
    position INT DEFAULT 0
);
```

### 3. Configure Database Connection

Edit `db.php` with your database credentials:

```php
$conn = new mysqli("localhost", "root", "", "todo_db");
```

### 4. Start Local Server

Using **XAMPP**, **WAMP**, or **PHP built-in server**:

```bash
php -S localhost:8000
```

Open browser at `http://localhost:8000`

---

## 📋 Todos for Future Improvements

* 🔐 User login system (multi-user support)
* 📅 Calendar view
* 🔔 Reminders & notifications
* 📊 Task analytics dashboard
* ☁️ Cloud deployment (Netlify + backend API or full-stack PHP host)

---

## 🤝 License

This project is open-source and free to use. MIT license.

