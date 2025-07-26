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
- 📱 **Fully responsive & mobile-friendly design** (works great on phones, tablets, and desktops)
- ♿ **Accessibility & touch-friendly improvements** (focus styles, large tap targets, reduced motion support)
- 👤 **User registration and login pages included** (multi-user support ready)

---

## 📸 UI Preview

> <img width="1600" height="711" alt="image" src="https://github.com/user-attachments/assets/3c3e9066-8d7f-43ce-8737-efe595749000" />
>
> *Now fully mobile-friendly! The app adapts beautifully to all screen sizes: mobile, tablet, and desktop.*

---

## 📁 Folder Structure

```
📦 todo-list-app/
│
├── index.html              # Main interface
├── style.css               # All styles (light + dark mode, responsive)
├── script.js               # Handles all UI and logic
├── db.php                  # MySQL connection
├── add_task.php            # Adds new task
├── delete_task.php         # Deletes a task
├── edit_task.php           # Edits task name
├── get_tasks.php           # Returns all tasks (JSON)
├── reorder_tasks.php       # Updates task order
├── toggle_pin.php          # Pins/unpins tasks
├── update_status.php       # Marks task complete/incomplete
├── register.html           # User registration page (frontend)
├── login.html              # User login page (frontend)
├── register.php            # User registration logic (backend)
├── login.php               # User login logic (backend)
```

---

## 🛠️ Technologies Used

- Frontend: HTML5, CSS3 (with responsive design), Vanilla JavaScript
- Backend: PHP 7+
- Database: MySQL
- Drag-and-drop: [SortableJS](https://sortablejs.github.io/Sortable/)
- Toasts: Custom lightweight implementation

---

## 📦 Setup Instructions

### 1. Clone or Download the Project

```bash
git clone https://github.com/Utsav017/to_do_web_app.git
```

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

- 📅 Calendar view
- 🔔 Reminders & notifications
- 📊 Task analytics dashboard
- ☁️ Cloud deployment (Netlify + backend API or full-stack PHP host)

---

## 🤝 License

This project is open-source and free to use. MIT license.

---

<sub>
This Web App is created by **Shivansh Gupta**  
[![LinkedIn](https://img.shields.io/badge/LinkedIn-blue?logo=linkedin&logoColor=white&style=flat-square)](https://www.linkedin.com/in/shivansh-gupta017)
[![GitHub](https://img.shields.io/badge/GitHub-@Utsav017-black?logo=github&logoColor=white&style=flat-square)](https://github.com/Utsav017)
</sub>
