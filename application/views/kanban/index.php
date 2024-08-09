<?php
 $this->load->helper('url');
 $this->load->view('partials/header');
 $this->load->view('partials/navbar');
?>

<div class="content">
    <div class="container mt-5">
        <h1 class="mb-4">Projects</h1>

        <form action="<?= site_url('kanban/create_project') ?>" method="post" class="mb-4 p-4 shadow-sm rounded">
            <div class="mb-3">
                <input type="text" name="name" class="form-control form-control-lg" placeholder="Project Name" required>
            </div>
            <div class="mb-3">
                <textarea name="description" class="form-control form-control-lg" placeholder="Project Description" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-lg w-100">Create Project</button>
        </form>

        <div class="row">
            <?php foreach ($projects as $project): ?>
            <div class="col-12 col-sm-6 col-md-4 mb-4">
                <div class="card card-custom">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="<?= site_url('kanban/view/' . $project->id) ?>"><?= $project->name ?></a>
                        </h5>
                        <p class="card-text"><?= $project->description ?></p>
                        <div class="actions">
                            <a href="<?= site_url('kanban/edit_project/' . $project->id) ?>" class="btn btn-sm btn-custom btn-edit">Edit</a>
                            <a href="<?= site_url('kanban/delete_project/' . $project->id) ?>" class="btn btn-sm btn-custom btn-delete" onclick="return confirm('Are you sure you want to delete this project?');">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php
 $this->load->view('partials/footer');
?>