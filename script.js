document.addEventListener("DOMContentLoaded", loadTasks);

document.getElementById("taskForm").addEventListener("submit", function (e) {
  e.preventDefault();
  const task = document.getElementById("taskInput").value;
  const category = document.getElementById("categoryInput").value;
  const deadline = document.getElementById("deadlineInput").value;
  const priority = document.getElementById("priorityInput").value;
  const reward = document.getElementById("rewardInput").value; // ✅ new

  fetch("add_task.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `task=${encodeURIComponent(task)}&category=${encodeURIComponent(
      category
    )}&deadline=${deadline}&priority=${priority}&reward=${encodeURIComponent(
      reward
    )}`,
  }).then(() => {
    loadTasks();
    document.getElementById("taskForm").reset(); // clear form
  });
});

function loadTasks() {
  fetch("get_tasks.php")
    .then((res) => res.json())
    .then((tasks) => {
      const list = document.getElementById("taskList");
      list.innerHTML = "";

      const grouped = groupTasksByDate(tasks);
      const dateOrder = Object.keys(grouped).sort(
        (a, b) => new Date(b) - new Date(a)
      );

      dateOrder.forEach((dateKey) => {
        const section = document.createElement("div");
        section.classList.add("date-group");

        const heading = document.createElement("h3");
        heading.textContent = formatDateHeading(dateKey);
        section.appendChild(heading);

        const ul = document.createElement("ul");
        ul.classList.add("task-ul");
        ul.dataset.date = dateKey;

        grouped[dateKey].forEach((task) => {
          const li = document.createElement("li");
          li.setAttribute("data-id", task.id);
          li.dataset.reward = task.reward || "";

          li.innerHTML = `
  <div class="task-main">
    <input type="checkbox" class="task-checkbox" ${
      task.status == 1 ? "checked" : ""
    } 
           onchange="toggleComplete(${task.id}, this.checked)">
    <span class="${task.status == 1 ? "completed" : ""}"
          contenteditable="true"
          onblur="editTask(${task.id}, this.innerText)">
      ${task.task}
    </span>
    <button class="delete-btn" onclick="deleteTask(${
      task.id
    })">Delete</button>
  </div>
  <small>
    📁 ${
      task.category
    } | 🏷️ <span class="priority ${task.priority.toLowerCase()}">${
            task.priority
          }</span>
    | <span class="pin-icon" onclick="togglePin(${task.id}, ${
            task.pinned
          })">
        ${task.pinned == 1 ? "📌 Pinned" : "📍 Pin"}
      </span>
  </small>
  ${
    task.reward
      ? `<small class="reward-line">🎉 Reward: ${task.reward}</small>`
      : ""
  }
`;

          ul.appendChild(li);
        });

        section.appendChild(ul);
        list.appendChild(section);

        // 📦 Make sortable
        new Sortable(ul, {
          group: "tasks",
          animation: 150,

          onStart: function (evt) {
            evt.item.classList.add("dragging");
          },

          onEnd: function (evt) {
            evt.item.classList.remove("dragging");

            const ul = evt.to;
            const date = ul.dataset.date;
            const taskIds = [...ul.children].map((li) => li.dataset.id);

            fetch("reorder_tasks.php", {
              method: "POST",
              headers: { "Content-Type": "application/json" },
              body: JSON.stringify({
                date: date,
                ids: taskIds,
              }),
            });
          },
        });
      });
    });
}

function groupTasksByDate(tasks) {
  const groups = {};
  tasks.forEach((task) => {
    const date = task.deadline;
    if (!groups[date]) groups[date] = [];
    groups[date].push(task);
  }); // <-- This closing parenthesis was missing

  // Sort pinned tasks to top within each group
  for (const date in groups) {
    groups[date].sort((a, b) => b.pinned - a.pinned); // 1 before 0
  }

  return groups;
}

function formatDateHeading(dateString) {
  const today = new Date();
  const taskDate = new Date(dateString);
  const yesterday = new Date();
  yesterday.setDate(today.getDate() - 1);

  const format = (d) => d.toISOString().split("T")[0];

  if (format(taskDate) === format(today)) return "📅 Today";
  if (format(taskDate) === format(yesterday)) return "📅 Yesterday";

  return `📅 ${taskDate.toLocaleDateString("en-GB", {
    day: "2-digit",
    month: "short",
    year: "numeric",
  })}`;
}

function deleteTask(id) {
  fetch("delete_task.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: "id=" + id,
  }).then(loadTasks);
}

function toggleComplete(id, checked) {
  fetch("update_status.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `id=${id}&status=${checked ? 1 : 0}`,
  }).then(() => {
    // ✅ Wait a bit before reloading UI
    setTimeout(() => {
      loadTasks();

      if (checked) {
        const taskEl = document.querySelector(`li[data-id='${id}']`);
        const rewardText = taskEl?.getAttribute("data-reward");
        if (rewardText) {
          showToast("🎉 Task complete! Reward yourself: " + rewardText);
        }
      }
    }, 200);
  });
}

function editTask(id, newText) {
  fetch("edit_task.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `id=${id}&task=${encodeURIComponent(newText)}`,
  });
}

function togglePin(id, pinned) {
  const newPin = pinned == 1 ? 0 : 1;
  fetch("toggle_pin.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `id=${id}&pinned=${newPin}`,
  }).then(loadTasks);
}
function toggleTheme() {
  document.body.classList.toggle("dark");
}
function showToast(message) {
  const container = document.getElementById("toast-container");
  const toast = document.createElement("div");
  toast.className = "toast";
  toast.textContent = message;

  container.appendChild(toast);

  // Remove toast after 4s
  setTimeout(() => {
    toast.remove();
  }, 4000);
}
