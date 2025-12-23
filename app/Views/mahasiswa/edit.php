<!-- app/Views/mahasiswa/edit.php -->
<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="card table-custom">
        <div class="card-header bg-white py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-edit me-2"></i> Edit Mahasiswa
            </h6>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            
            <form action="<?= base_url('mahasiswa/update/' . $mahasiswa['id']) ?>" method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">NIM</label>
                        <input type="text" class="form-control" name="nim" value="<?= esc($mahasiswa['nim']) ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" value="<?= esc($mahasiswa['nama']) ?>" required>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jurusan</label>
                        <input type="text" class="form-control" name="jurusan" value="<?= esc($mahasiswa['jurusan']) ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Angkatan</label>
                        <input type="number" class="form-control" name="angkatan" value="<?= esc($mahasiswa['angkatan']) ?>" required>
                    </div>
                </div>
                
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary btn-custom">
                        <i class="fas fa-save me-2"></i> Update
                    </button>
                    <a href="<?= base_url('mahasiswa') ?>" class="btn btn-secondary btn-custom">
                        <i class="fas fa-arrow-left me-2"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>