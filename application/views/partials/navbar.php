<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-2">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center">
            <a class="navbar-brand d-flex align-items-center" href="<?= site_url('/') ?>">
                <i class="fas fa-tasks me-2 text-light"></i>
                <span class="fw-bold text-light">Kanban Board</span>
            </a>
            <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-light" href="<?= site_url('/') ?>">
                        <i class="fas fa-home me-2"></i>Home
                    </a>
                </li>
                <?php
                $logged_in = $this->session->userdata('user_id');
                if (!$logged_in): ?>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-light" href="<?= site_url('auth/login') ?>">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="<?= site_url('auth/logout') ?>">
                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                        </a>
                    </li>
                <?php endif; ?>
                <li class="nav-item d-flex align-items-center ms-3">
                    <div class="mode-switcher d-flex align-items-center">
                        <i class="fas fa-sun text-warning me-2"></i>
                        <div class="form-check form-switch mb-0">
                            <input class="form-check-input" type="checkbox" id="modeSwitcher" checked>
                            <label class="form-check-label text-light" for="modeSwitcher"></label>
                        </div>
                        <i class="fas fa-moon text-primary ms-2"></i>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>