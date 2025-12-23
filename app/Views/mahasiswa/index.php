<!-- app/Views/mahasiswa/index.php -->
<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="card table-custom">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-user-graduate me-2"></i> Data Mahasiswa
            </h6>
            <a href="<?= base_url('mahasiswa/create') ?>" class="btn btn-primary btn-custom">
                <i class="fas fa-plus me-2"></i> Tambah Mahasiswa
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
                            <th>Angkatan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 + (10 * ($pager->getCurrentPage() - 1)); ?>
                        <?php foreach ($mahasiswa as $m): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><strong><?= esc($m['nim']) ?></strong></td>
                            <td><?= esc($m['nama']) ?></td>
                            <td><?= esc($m['jurusan']) ?></td>
                            <td><?= esc($m['angkatan']) ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('mahasiswa/edit/' . $m['id']) ?>" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('mahasiswa/delete/' . $m['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="mt-3">
                <?= $pager->links() ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>