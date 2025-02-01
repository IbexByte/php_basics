<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
        .task-actions button {
            border: none;
            transition: all 0.3s;
        }
        .task-actions button:hover {
            transform: scale(1.1);
        }
        .container {
            max-width: 600px;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4 text-primary"><i class="fa-solid fa-list-check"></i> Task Manager</h1>

        <!-- Form to input description -->
        <form action="create/task" method="post" class="mb-4 shadow-sm p-3 bg-white rounded">
            <div class="mb-3">
                <label for="description" class="form-label">New Task:</label>
                <textarea id="description" name="description" class="form-control" rows="2" placeholder="Enter task details..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-plus"></i> Add Task</button>
        </form>

        <!-- List of tasks -->
        <ul class="list-group shadow-sm">
            <?php foreach ($tasks as $task) : ?>
                <li class="list-group-item d-flex align-items-center task <?= $task->completed ? 'completed' : '' ?>">
                    <span class="flex-grow-1"><?= htmlspecialchars($task->description) ?></span>
                    <div class="task-actions">
                        <!-- Toggle Completion -->
                        <form action="update/task" method="post">
                            <input type="hidden" name="id" value="<?= $task->id ?>">
                            <input type="hidden" name="completed" value="<?= $task->completed ? '0' : '1' ?>">
                            <button type="submit" class="btn btn-sm <?= $task->completed ? 'btn-warning' : 'btn-success' ?>">
                                <i class="fa-solid <?= $task->completed ? 'fa-undo' : 'fa-check' ?>"></i>
                            </button>
                        </form>
                        <!-- Delete Task -->
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
</body>
</html>
