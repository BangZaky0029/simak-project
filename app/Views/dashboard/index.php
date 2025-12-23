<!-- app/Views/dashboard/index.php -->
<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 15px;">
                <div class="card-body text-white p-4">
                    <h2 class="mb-2"><i class="fas fa-hand-wave me-2"></i> Selamat Datang, <?= esc($username) ?>!</h2>
                    <p class="mb-0 opacity-75">Kelola data akademik mahasiswa dengan mudah dan efisien</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Statistics Cards -->
    <div class="row">
        <!-- Total Mahasiswa -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card stat-card border-left-primary" style="border-left: 4px solid #4e73df;">
                <div class="card-body position-relative">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Mahasiswa
                            </div>
                            <div class="h2 mb-0 font-weight-bold text-gray-800"><?= $total_mahasiswa ?></div>
                            <div class="text-muted small mt-2">
                                <i class="fas fa-user-graduate me-1"></i> Mahasiswa Terdaftar
                            </div>
                        </div>
                    </div>
                    <i class="fas fa-user-graduate stat-icon text-primary"></i>
                </div>
            </div>
        </div>
        
        <!-- Total Mata Kuliah -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card stat-card border-left-success" style="border-left: 4px solid #1cc88a;">
                <div class="card-body position-relative">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Mata Kuliah
                            </div>
                            <div class="h2 mb-0 font-weight-bold text-gray-800"><?= $total_matakuliah ?></div>
                            <div class="text-muted small mt-2">
                                <i class="fas fa-book me-1"></i> Mata Kuliah Aktif
                            </div>
                        </div>
                    </div>
                    <i class="fas fa-book stat-icon text-success"></i>
                </div>
            </div>
        </div>
        
        <!-- Total Nilai -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card stat-card border-left-info" style="border-left: 4px solid #36b9cc;">
                <div class="card-body position-relative">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Data Nilai
                            </div>
                            <div class="h2 mb-0 font-weight-bold text-gray-800"><?= $total_nilai ?></div>
                            <div class="text-muted small mt-2">
                                <i class="fas fa-chart-line me-1"></i> Nilai Tercatat
                            </div>
                        </div>
                    </div>
                    <i class="fas fa-chart-line stat-icon text-info"></i>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Quick Actions -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0 table-custom">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-bolt me-2"></i> Quick Actions
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-3 mb-3">
                            <a href="<?= base_url('mahasiswa/create') ?>" class="text-decoration-none">
                                <div class="p-3 bg-primary bg-opacity-10 rounded">
                                    <i class="fas fa-user-plus fa-2x text-primary mb-2"></i>
                                    <p class="mb-0 text-dark">Tambah Mahasiswa</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="<?= base_url('matakuliah/create') ?>" class="text-decoration-none">
                                <div class="p-3 bg-success bg-opacity-10 rounded">
                                    <i class="fas fa-book-medical fa-2x text-success mb-2"></i>
                                    <p class="mb-0 text-dark">Tambah Mata Kuliah</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="<?= base_url('nilai/create') ?>" class="text-decoration-none">
                                <div class="p-3 bg-info bg-opacity-10 rounded">
                                    <i class="fas fa-file-signature fa-2x text-info mb-2"></i>
                                    <p class="mb-0 text-dark">Input Nilai</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="<?= base_url('nilai/laporan') ?>" class="text-decoration-none">
                                <div class="p-3 bg-warning bg-opacity-10 rounded">
                                    <i class="fas fa-file-download fa-2x text-warning mb-2"></i>
                                    <p class="mb-0 text-dark">Lihat Laporan</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>