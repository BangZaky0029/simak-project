<!-- app/Views/nilai/index.php -->
<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="card table-custom">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-chart-line me-2"></i> Data Nilai
            </h6>
            <a href="<?= base_url('nilai/create') ?>" class="btn btn-primary btn-custom">
                <i class="fas fa-plus me-2"></i> Input Nilai
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Mata Kuliah</th>
                            <th>Nilai Angka</th>
                            <th>Nilai Huruf</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($nilai as $n): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><strong><?= esc($n['nim']) ?></strong></td>
                            <td><?= esc($n['nama']) ?></td>
                            <td><?= esc($n['nama_mk']) ?></td>
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
                            <td class="text-center">
                                <a href="<?= base_url('nilai/edit/' . $n['id']) ?>" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('nilai/delete/' . $n['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>