<!-- app/Views/matakuliah/index.php -->
<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="card table-custom">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-book me-2"></i> Data Mata Kuliah
            </h6>
            <a href="<?= base_url('matakuliah/create') ?>" class="btn btn-primary btn-custom">
                <i class="fas fa-plus me-2"></i> Tambah Mata Kuliah
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Kode MK</th>
                            <th>Nama Mata Kuliah</th>
                            <th>SKS</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 + (10 * ($pager->getCurrentPage() - 1)); ?>
                        <?php foreach ($matakuliah as $mk): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><strong><?= esc($mk['kode_mk']) ?></strong></td>
                            <td><?= esc($mk['nama_mk']) ?></td>
                            <td><span class="badge bg-info"><?= esc($mk['sks']) ?> SKS</span></td>
                            <td class="text-center">
                                <a href="<?= base_url('matakuliah/edit/' . $mk['id']) ?>" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('matakuliah/delete/' . $mk['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                <?= $pager->links() ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>