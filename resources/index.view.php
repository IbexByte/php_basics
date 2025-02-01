<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <style>
        .task.completed {
            text-decoration: line-through;
            color: #888;
            background-color: #f8f9fa;
        }
        .task-actions {
            margin-left: auto;
            display: flex;
            gap: 5px;
        }
        .container {
            max-width: 600px;
        }
        .nav-tabs .nav-link.active {
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4 text-primary"><i class="fa-solid fa-list-check"></i> Task Manager</h1>
        <form action="create/task" method="post" class="mb-4 shadow-sm p-3 bg-white rounded">
            <div class="mb-3">
                <label for="description" class="form-label">New Task:</label>
                <textarea id="description" name="description" class="form-control" rows="2" placeholder="Enter task details..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-plus"></i> Add Task</button>
        </form>

        <!-- تبويبات التصفية -->
        <ul class="nav nav-tabs mb-3" id="taskTabs">
            <li class="nav-item">
                <a class="nav-link" href="<?= home() ?>" data-filter="all">All Tasks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?completed=1" data-filter="completed">Completed</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?completed=0" data-filter="incomplete">Incomplete</a>
            </li>
        </ul>

        <!-- قائمة المهام -->
        <ul class="list-group shadow-sm" id="taskList">
            <?php foreach ($tasks as $task) : ?>
                <li class="list-group-item d-flex align-items-center task <?= $task->completed ? 'completed' : '' ?>" data-status="<?= $task->completed ? 'completed' : 'incomplete' ?>">
                    <span class="flex-grow-1"><?= htmlspecialchars($task->description) ?></span>
                    <div class="task-actions">
                        <form action="update/task" method="post">
                            <input type="hidden" name="id" value="<?= $task->id ?>">
                            <input type="hidden" name="completed" value="<?= $task->completed ? '0' : '1' ?>">
                            <button type="submit" class="btn btn-sm <?= $task->completed ? 'btn-warning' : 'btn-success' ?>">
                                <i class="fa-solid <?= $task->completed ? 'fa-undo' : 'fa-check' ?>"></i>
                            </button>
                        </form>
                        <form action="delete/task" method="post" onsubmit="return confirm('Are you sure you want to delete this task?');">
                            <input type="hidden" name="id" value="<?= $task->id ?>">
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript لتحديد التبويب النشط بناءً على ?completed -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const urlParams = new URLSearchParams(window.location.search);
            const completedParam = urlParams.get("completed");

            // تحديد التبويب النشط
            document.querySelectorAll(".nav-tabs .nav-link").forEach(tab => {
                tab.classList.remove("active"); 

                if ((completedParam === "1" && tab.getAttribute("href") === "?completed=1") ||
                    (completedParam === "0" && tab.getAttribute("href") === "?completed=0") ||
                    (!completedParam && tab.getAttribute("href") === "http://localhost/examProjects/php_basics/")) {
                    tab.classList.add("active");  
                }
            });
        });
    </script>
</body>
</html>
