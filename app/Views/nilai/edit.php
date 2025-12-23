<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>  <!-- Buka section 'content' -->

<div class="main-content">
    <div class="container-fluid">
        <div class="mb-4">
            <h1 class="mb-2"><?= $title ?></h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('nilai') ?>">Data Nilai</a></li>
                    <li class="breadcrumb-item active">Edit Nilai</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="bi bi-pencil-square"></i> Form Edit Nilai</h5>
                    </div>
                    <div class="card-body">
                        <?php if(session()->getFlashdata('errors')): ?>
                            <div class="alert alert-danger">
                                <strong>Terjadi kesalahan:</strong>
                                <ul class="mb-0">
                                    <?php foreach(session()->getFlashdata('errors') as $error): ?>
                                        <li><?= $error ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <!-- Info Mahasiswa & Mata Kuliah -->
                        <div class="alert alert-info">
                            <strong><i class="bi bi-info-circle-fill"></i> Data Saat Ini:</strong><br>
                            <div class="mt-2">
                                <i class="bi bi-person-fill"></i> <strong>Mahasiswa:</strong> <?= esc($nilai['nim']) ?> - <?= esc($nilai['nama_mahasiswa']) ?><br>
                                <i class="bi bi-book-fill"></i> <strong>Mata Kuliah:</strong> <?= esc($nilai['kode_mk']) ?> - <?= esc($nilai['nama_mk']) ?><br>
                                <i class="bi bi-star-fill"></i> <strong>Nilai Saat Ini:</strong> <?= esc($nilai['nilai_angka']) ?> (Huruf: <?= esc($nilai['nilai_huruf']) ?>)
                            </div>
                        </div>

                        <form action="<?= base_url('nilai/update/' . $nilai['id']) ?>" method="POST">
                            <div class="mb-3">
                                <label for="mahasiswa_id" class="form-label">Mahasiswa <span class="text-danger">*</span></label>
                                <select class="form-select" id="mahasiswa_id" name="mahasiswa_id" required>
                                    <option value="">-- Pilih Mahasiswa --</option>
                                    <?php foreach($mahasiswa as $mhs): ?>
                                        <option value="<?= $mhs['id'] ?>" <?= $nilai['mahasiswa_id'] == $mhs['id'] ? 'selected' : '' ?>>
                                            <?= esc($mhs['nim']) ?> - <?= esc($mhs['nama']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-muted">Pilih mahasiswa yang akan diedit nilainya</small>
                            </div>

                            <div class="mb-3">
                                <label for="matakuliah_id" class="form-label">Mata Kuliah <span class="text-danger">*</span></label>
                                <select class="form-select" id="matakuliah_id" name="matakuliah_id" required>
                                    <option value="">-- Pilih Mata Kuliah --</option>
                                    <?php foreach($matakuliah as $mk): ?>
                                        <option value="<?= $mk['id'] ?>" <?= $nilai['matakuliah_id'] == $mk['id'] ? 'selected' : '' ?>>
                                            <?= esc($mk['kode_mk']) ?> - <?= esc($mk['nama_mk']) ?> (<?= esc($mk['sks']) ?> SKS)
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-muted">Pilih mata kuliah</small>
                            </div>

                            <div class="mb-3">
                                <label for="nilai_angka" class="form-label">Nilai Angka <span class="text-danger">*</span></label>
                                <input type="number" class="form-control form-control-lg" id="nilai_angka" name="nilai_angka" value="<?= old('nilai_angka', $nilai['nilai_angka']) ?>" min="0" max="100" step="0.01" required>
                                <small class="text-muted">Masukkan nilai 0-100 (sistem akan otomatis mengkonversi ke huruf)</small>
                            </div>

                            <div class="alert alert-warning">
                                <strong><i class="bi bi-calculator-fill"></i> Konversi Nilai Otomatis:</strong>
                                <table class="table table-sm table-bordered mt-2 mb-0" style="background: white;">
                                    <thead>
                                        <tr>
                                            <th>Nilai Angka</th>
                                            <th>Nilai Huruf</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>≥ 85</td>
                                            <td><span class="badge bg-success">A</span></td>
                                        </tr>
                                        <tr>
                                            <td>70 - 84</td>
                                            <td><span class="badge bg-primary">B</span></td>
                                        </tr>
                                        <tr>
                                            <td>55 - 69</td>
                                            <td><span class="badge bg-info">C</span></td>
                                        </tr>
                                        <tr>
                                            <td>40 - 54</td>
                                            <td><span class="badge bg-warning">D</span></td>
                                        </tr>
                                        <tr>
                                            <td>< 40</td>
                                            <td><span class="badge bg-danger">E</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="<?= base_url('nilai') ?>" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Update Nilai
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Preview Nilai Sidebar -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h6 class="mb-0"><i class="bi bi-eye-fill"></i> Preview Nilai</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <p class="mb-1 text-muted small">MAHASISWA</p>
                            <h6 class="mb-0"><?= esc($nilai['nama_mahasiswa']) ?></h6>
                            <small class="text-muted"><?= esc($nilai['nim']) ?></small>
                        </div>
                        
                        <hr>
                        
                        <div class="mb-3">
                            <p class="mb-1 text-muted small">JURUSAN</p>
                            <h6 class="mb-0"><?= esc($nilai['jurusan']) ?></h6>
                        </div>
                        
                        <hr>
                        
                        <div class="mb-3">
                            <p class="mb-1 text-muted small">MATA KULIAH</p>
                            <h6 class="mb-0"><?= esc($nilai['nama_mk']) ?></h6>
                            <small class="text-muted"><?= esc($nilai['kode_mk']) ?> - <?= esc($nilai['sks']) ?> SKS</small>
                        </div>
                        
                        <hr>
                        
                        <div class="text-center">
                            <p class="mb-2 text-muted small">NILAI HURUF SAAT INI</p>
                            <?php
                            $badge_class = '';
                            switch($nilai['nilai_huruf']) {
                                case 'A': $badge_class = 'bg-success'; break;
                                case 'B': $badge_class = 'bg-primary'; break;
                                case 'C': $badge_class = 'bg-info'; break;
                                case 'D': $badge_class = 'bg-warning'; break;
                                case 'E': $badge_class = 'bg-danger'; break;
                            }
                            ?>
                            <h1><span class="badge <?= $badge_class ?>" style="font-size: 48px; padding: 15px 30px;"><?= esc($nilai['nilai_huruf']) ?></span></h1>
                            <p class="text-muted mt-2">Nilai Angka: <strong><?= esc($nilai['nilai_angka']) ?></strong></p>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <small class="text-muted">
                            <i class="bi bi-clock-fill"></i> Terakhir diupdate:<br>
                            <?= date('d M Y H:i', strtotime($nilai['updated_at'] ?? $nilai['created_at'])) ?>
                        </small>
                    </div>
                </div>

                <!-- Info Tambahan -->
                <div class="card mt-3">
                    <div class="card-body">
                        <h6 class="text-muted mb-3"><i class="bi bi-lightbulb-fill text-warning"></i> Tips</h6>
                        <ul class="small mb-0">
                            <li>Nilai akan otomatis dikonversi ke huruf</li>
                            <li>Pastikan data mahasiswa & mata kuliah sudah benar</li>
                            <li>Nilai angka harus antara 0-100</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>  <!-- Tutup section 'content' -->
