<!-- app/Views/nilai/laporan.php -->
<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="card table-custom mb-3">
        <div class="card-header bg-white py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-filter me-2"></i> Filter Laporan
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('nilai/laporan') ?>" method="GET">
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label class="form-label">Mahasiswa</label>
                        <select class="form-select" name="mahasiswa_id">
                            <option value="">-- Semua Mahasiswa --</option>
                            <?php foreach ($mahasiswa as $m): ?>
                                <option value="<?= $m['id'] ?>" <?= $selected_mahasiswa == $m['id'] ? 'selected' : '' ?>>
                                    <?= esc($m['nim']) ?> - <?= esc($m['nama']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="col-md-5 mb-3">
                        <label class="form-label">Mata Kuliah</label>
                        <select class="form-select" name="matakuliah_id">
                            <option value="">-- Semua Mata Kuliah --</option>
                            <?php foreach ($matakuliah as $mk): ?>
                                <option value="<?= $mk['id'] ?>" <?= $selected_matakuliah == $mk['id'] ? 'selected' : '' ?>>
                                    <?= esc($mk['kode_mk']) ?> - <?= esc($mk['nama_mk']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="col-md-2 mb-3">
                        <label class="form-label">&nbsp;</label>
                        <button type="submit" class="btn btn-primary btn-custom w-100">
                            <i class="fas fa-search me-2"></i> Filter
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div class="card table-custom">
        <div class="card-header bg-white py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-file-alt me-2"></i> Laporan Nilai
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Kode MK</th>
                            <th>Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Nilai Angka</th>
                            <th>Nilai Huruf</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($nilai)): ?>
                        <tr>
                            <td colspan="8" class="text-center text-muted">
                                <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                Tidak ada data nilai
                            </td>
                        </tr>
                        <?php else: ?>
                            <?php $no = 1; ?>
                            <?php foreach ($nilai as $n): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><strong><?= esc($n['nim']) ?></strong></td>
                                <td><?= esc($n['nama']) ?></td>
                                <td><?= esc($n['kode_mk']) ?></td>
                                <td><?= esc($n['nama_mk']) ?></td>
                                <td><span class="badge bg-info"><?= esc($n['sks']) ?> SKS</span></td>
                                <td><?= esc($n['nilai_angka']) ?></td>
                                <td>
                                    <?php 
                                    $badgeClass = 'bg-secondary';
                                    if ($n['nilai_huruf'] == 'A') $badgeClass = 'bg-success';
                                    elseif ($n['nilai_huruf'] == 'B') $badgeClass = 'bg-primary';
                                    elseif ($n['nilai_huruf'] == 'C') $badgeClass = 'bg-warning';
                                    elseif ($n['nilai_huruf'] == 'D') $badgeClass = 'bg-danger';
                                    ?>
                                    <span class="badge <?= $badgeClass ?>"><?= esc($n['nilai_huruf']) ?></span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>