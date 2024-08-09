<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>

<div class="content-wrapper d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="register-container fade-in">
                    <h1 class="text-center mb-4">Daftar</h1>
                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?= site_url('auth/register_process') ?>" method="post" class="form">
                        <div class="mb-3">
                            <input type="text" name="username" placeholder="Nama Pengguna" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" placeholder="Kata Sandi" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Daftar</button>
                    </form>
                    <div class="text-center text-muted mt-3">
                        Sudah menjadi anggota? <a href="<?= site_url('auth/login') ?>">Masuk sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('partials/footer'); ?>