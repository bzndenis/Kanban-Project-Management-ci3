<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>

<div class="hero">
    <div>
        <h1>Kanban Project Management</h1>
        <h3>Kelola proyek Anda dengan efisien dan efektif menggunakan metode Kanban.</h3>
        <a href="#features" class="btn btn-primary btn-lg">Pelajari Lebih Lanjut</a>
    </div>
</div>

<div id="features" class="features container-fluid py-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="icon">
                    <i class="fas fa-tasks fa-3x"></i>
                </div>
                <h3>Visualisasi Pekerjaan</h3>
                <p>Kanban membantu Anda memvisualisasikan pekerjaan Anda dan mengidentifikasi hambatan dengan mudah.</p>
            </div>
            <div class="col-md-4">
                <div class="icon">
                    <i class="fas fa-chart-line fa-3x"></i>
                </div>
                <h3>Efisiensi Proses</h3>
                <p>Dengan Kanban, Anda dapat meningkatkan efisiensi proses dan mengurangi waktu siklus.</p>
            </div>
            <div class="col-md-4">
                <div class="icon">
                    <i class="fas fa-users fa-3x"></i>
                </div>
                <h3>Kolaborasi Tim</h3>
                <p>Kanban memfasilitasi kolaborasi tim yang lebih baik dan komunikasi yang lebih efektif.</p>
            </div>
        </div>
    </div>
</div>

<div class="cta">
    <h2>Mulai Kelola Proyek Anda dengan Kanban</h2>
    <a href="<?= site_url('auth/register') ?>">Mulai Sekarang</a>
</div>

<?php $this->load->view('partials/footer'); ?>