<?php
 $this->load->helper('url');
 $this->load->view('partials/header');
 $this->load->view('partials/navbar');
?>

<div class="container-fluid mt-5">
<h1 class="text-center mb-4 d-flex justify-content-center align-items-center">
    Project <?php echo $project_name; ?> - Kanban Board
    <div class="mode-switcher d-flex align-items-center ms-3">
        <svg id="toggleIcon" class="svg-inline--fa fa-minus text-danger me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="minus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H32c-17.67 0-32 14.33-32 32s14.33 32 32 32h384c17.67 0 32-14.33 32-32s-14.33-32-32-32z"></path></svg>
        <div class="form-check form-switch mb-0">
            <input class="form-check-input" type="checkbox" id="toggleFormSwitch" checked>
            <label class="form-check-label text-light" for="toggleFormSwitch"></label>
        </div>
        <svg class="svg-inline--fa fa-plus text-success ms-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 256c0 13.3-10.7 24-24 24H272v136c0 13.3-10.7 24-24 24s-24-10.7-24-24V280H72c-13.3 0-24-10.7-24-24s10.7-24 24-24h136V96c0-13.3 10.7-24 24-24s24 10.7 24 24v136h136c13.3 0 24 10.7 24 24z"></path></svg>
    </div>
</h1>

<div id="formContainer" class="mb-4">
    <div class="row">
        <div class="col-md-6">
            <form action="<?php echo site_url('kanban/create_task'); ?>" method="post" class="mb-4 p-4 shadow rounded bg-dark text-light" id="taskForm">
                <h3 class="mb-4 text-center">Tambah Tugas Baru</h3>
                <input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Tugas</label>
                    <input type="text" class="form-control form-control-lg bg-secondary text-light" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi Tugas</label>
                    <textarea class="form-control form-control-lg bg-secondary text-light" id="description" name="description" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-lg w-100">Tambah Tugas</button>
            </form>
        </div>
        
        <div class="col-md-6">
            <form action="<?php echo site_url('kanban/add_member'); ?>" method="post" class="mb-4 p-4 shadow rounded bg-dark text-light" id="memberForm">
                <h3 class="mb-4 text-center">Tambah Anggota Tim</h3>
                <input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
                <div class="mb-3">
                    <label for="user_id" class="form-label">Pilih Anggota</label>
                    <select class="form-control form-control-lg bg-secondary text-light select2-ajax" id="user_id" name="user_id" required>
                        <option value="">Pilih Anggota</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success btn-lg w-100">Tambah Anggota</button>
            </form>
        </div>
    </div>
</div>

<style>
    #formContainer {
        transition: all 0.3s ease-in-out;
    }
    #formContainer.collapsed {
        max-height: 0;
        opacity: 0;
        padding: 0;
        margin: 0;
    }
    .form-control:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
    .btn-primary, .btn-success {
        transition: all 0.3s ease;
    }
    .btn-primary:hover, .btn-success:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }
</style>

   <div class="kanban-board" id="kanban-board">
        <div class="kanban-column" id="task">
            <h2>To Do</h2>
            <?php foreach ($tasks as $task): ?>
                <?php if ($task->status == 'task'): ?>
                    <div class="kanban-item card mb-3" data-id="<?php echo $task->id; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $task->title; ?></h5>
                            <p class="card-text"><?php echo $task->description; ?></p>
                            <div class="actions d-flex justify-content-between">
                                <a href="<?php echo site_url('kanban/edit_task/' . $task->id); ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="<?php echo site_url('kanban/delete_task/' . $task->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this task?');">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="kanban-column" id="ongoing">
            <h2>Ongoing</h2>
            <?php foreach ($tasks as $task): ?>
                <?php if ($task->status == 'ongoing'): ?>
                    <div class="kanban-item card mb-3" data-id="<?php echo $task->id; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $task->title; ?></h5>
                            <p class="card-text"><?php echo $task->description; ?></p>
                            <div class="actions d-flex justify-content-between">
                                <a href="<?php echo site_url('kanban/edit_task/' . $task->id); ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="<?php echo site_url('kanban/delete_task/' . $task->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this task?');">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="kanban-column" id="review">
            <h2>Review</h2>
            <?php foreach ($tasks as $task): ?>
                <?php if ($task->status == 'review'): ?>
                    <div class="kanban-item card mb-3" data-id="<?php echo $task->id; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $task->title; ?></h5>
                            <p class="card-text"><?php echo $task->description; ?></p>
                            <div class="actions d-flex justify-content-between">
                                <a href="<?php echo site_url('kanban/edit_task/' . $task->id); ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="<?php echo site_url('kanban/delete_task/' . $task->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this task?');">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="kanban-column" id="finish">
            <h2>Finish</h2>
            <?php foreach ($tasks as $task): ?>
                <?php if ($task->status == 'finish'): ?>
                    <div class="kanban-item card mb-3" data-id="<?php echo $task->id; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $task->title; ?></h5>
                            <p class="card-text"><?php echo $task->description; ?></p>
                            <div class="actions d-flex justify-content-between">
                                <a href="<?php echo site_url('kanban/edit_task/' . $task->id); ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="<?php echo site_url('kanban/delete_task/' . $task->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this task?');">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php
 $this->load->view('partials/footer');
?>