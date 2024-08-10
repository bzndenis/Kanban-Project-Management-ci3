<!DOCTYPE html>
<html>
<head>
    <title>Kanban Board</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <h1>Tasks</h1>
    <form action="<?= site_url('kanban/create_task') ?>" method="post">
        <input type="hidden" name="project_id" value="<?= $this->uri->segment(3) ?>">
        <input type="text" name="title" placeholder="Task Title" required>
        <textarea name="description" placeholder="Task Description"></textarea>
        <button type="submit">Create Task</button>
    </form>
    <div class="kanban-board">
        <div class="kanban-column">
            <h2>To Do</h2>
            <?php foreach ($tasks as $task): ?>
                <?php if ($task->status == 'todo'): ?>
                    <div class="kanban-task">
                        <h3><?= $task->title ?></h3>
                        <p><?= $task->description ?></p>
                        <form action="<?= site_url('kanban/update_task_status') ?>" method="post">
                            <input type="hidden" name="task_id" value="<?= $task->id ?>">
                            <select name="status">
                                <option value="todo" <?= $task->status == 'todo' ? 'selected' : ''; ?>>To Do</option>
                                <option value="ongoing" <?= $task->status == 'ongoing' ? 'selected' : ''; ?>>Ongoing</option>
                                <option value="review" <?= $task->status == 'review' ? 'selected' : ''; ?>>Review</option>
                                <option value="finish" <?= $task->status == 'finish' ? 'selected' : ''; ?>>Finish</option>
                            </select>
                            <button type="submit">Update</button>
                        </form>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>