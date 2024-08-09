<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
<div class="container mt-5">
    <h1>Edit Task</h1>
    
    <form action="<?php echo site_url('kanban/update_task'); ?>" method="post" class="mb-4">
        <input type="hidden" name="task_id" value="<?php echo $task->id; ?>">
        <input type="hidden" name="project_id" value="<?php echo $task->project_id; ?>">
        <div class="mb-3">
            <label for="title" class="form-label">Task Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $task->title; ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Task Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required><?php echo $task->description; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Task Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="task" <?php echo $task->status == 'task' ? 'selected' : ''; ?>>Task</option>
                <option value="ongoing" <?php echo $task->status == 'ongoing' ? 'selected' : ''; ?>>Ongoing</option>
                <option value="review" <?php echo $task->status == 'review' ? 'selected' : ''; ?>>Review</option>
                <option value="finish" <?php echo $task->status == 'finish' ? 'selected' : ''; ?>>Finish</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
</div>
<?php $this->load->view('partials/footer'); ?>