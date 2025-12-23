<!-- app/Views/nilai/create.php -->
<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="card table-custom">
        <div class="card-header bg-white py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-file-signature me-2"></i> Input Nilai
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
            
            <form action="<?= base_url('nilai/store') ?>" method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Mahasiswa</label>
                        <select class="form-select" name="mahasiswa_id" required>
                            <option value="">-- Pilih Mahasiswa --</option>
                            <?php foreach ($mahasiswa as $m): ?>
                                <option value="<?= $m['id'] ?>" <?= old('mahasiswa_id') == $m['id'] ? 'selected' : '' ?>>
                                    <?= esc($m['nim']) ?> - <?= esc($m['nama']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Mata Kuliah</label>
                        <select class="form-select" name="matakuliah_id" required>
                            <option value="">-- Pilih Mata Kuliah --</option>
                            <?php foreach ($matakuliah as $mk): ?>
                                <option value="<?= $mk['id'] ?>" <?= old('matakuliah_id') == $mk['id'] ? 'selected' : '' ?>>
                                    <?= esc($mk['kode_mk']) ?> - <?= esc($mk['nama_mk']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Nilai Angka (0-100)</label>
                    <input type="number" class="form-control" name="nilai_angka" value="<?= old('nilai_angka') ?>" min="0" max="100" step="0.01" required>
                    <small class="text-muted">
                        <i class="fas fa-info-circle me-1"></i>
                        Nilai huruf akan otomatis dikonversi: A(≥85), B(70-84), C(55-69), D(40-54), E(<40)
                    </small>
                </div>
                
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary btn-custom">
                        <i class="fas fa-save me-2"></i> Simpan
                    </button>
                    <a href="<?= base_url('nilai') ?>" class="btn btn-secondary btn-custom">
                        <i class="fas fa-arrow-left me-2"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
