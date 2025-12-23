<!-- app/Views/matakuliah/create.php -->
<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="card table-custom">
        <div class="card-header bg-white py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-book-medical me-2"></i> Tambah Mata Kuliah
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
            
            <form action="<?= base_url('matakuliah/store') ?>" method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Kode Mata Kuliah</label>
                        <input type="text" class="form-control" name="kode_mk" value="<?= old('kode_mk') ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">SKS</label>
                        <input type="number" class="form-control" name="sks" value="<?= old('sks') ?>" required>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Nama Mata Kuliah</label>
                    <input type="text" class="form-control" name="nama_mk" value="<?= old('nama_mk') ?>" required>
                </div>
                
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary btn-custom">
                        <i class="fas fa-save me-2"></i> Simpan
                    </button>
                    <a href="<?= base_url('matakuliah') ?>" class="btn btn-secondary btn-custom">
                        <i class="fas fa-arrow-left me-2"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>