<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
<div class="container mt-5">
    <h1>Edit Project</h1>
    
    <form action="<?php echo site_url('kanban/update_project'); ?>" method="post" class="mb-4">
        <input type="hidden" name="project_id" value="<?php echo $project->id; ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Project Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $project->name; ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Project Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required><?php echo $project->description; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Project</button>
    </form>
</div>
<?php $this->load->view('partials/footer'); ?>