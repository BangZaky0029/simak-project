<?php

namespace App\Models;

use CodeIgniter\Model;

// ==================== NILAI MODEL ====================
class NilaiModel extends Model
{
    protected $table      = 'nilai';
    protected $primaryKey = 'id';
    protected $allowedFields = ['mahasiswa_id', 'matakuliah_id', 'nilai_angka', 'nilai_huruf'];
    protected $useTimestamps = true;
    
    protected $validationRules = [
        'mahasiswa_id'  => 'required|integer',
        'matakuliah_id' => 'required|integer',
        'nilai_angka'   => 'required|decimal|greater_than_equal_to[0]|less_than_equal_to[100]',
    ];

    // Konversi nilai angka ke huruf otomatis
    public function convertGrade($nilai_angka)
    {
        if ($nilai_angka >= 85) return 'A';
        if ($nilai_angka >= 70) return 'B';
        if ($nilai_angka >= 55) return 'C';
        if ($nilai_angka >= 40) return 'D';
        return 'E';
    }

    // Get nilai dengan join mahasiswa dan mata kuliah
    public function getNilaiWithDetails($mahasiswa_id = null, $matakuliah_id = null)
    {
        $builder = $this->db->table('nilai');
        $builder->select('nilai.*, mahasiswa.nim, mahasiswa.nama, matakuliah.kode_mk, matakuliah.nama_mk, matakuliah.sks');
        $builder->join('mahasiswa', 'mahasiswa.id = nilai.mahasiswa_id');
        $builder->join('matakuliah', 'matakuliah.id = nilai.matakuliah_id');
        
        if ($mahasiswa_id) {
            $builder->where('nilai.mahasiswa_id', $mahasiswa_id);
        }
        
        if ($matakuliah_id) {
            $builder->where('nilai.matakuliah_id', $matakuliah_id);
        }
        
        return $builder->get()->getResultArray();
    }

    // Override insert untuk auto-convert grade
    public function insert($data = null, bool $returnID = true)
    {
        if (isset($data['nilai_angka'])) {
            $data['nilai_huruf'] = $this->convertGrade($data['nilai_angka']);
        }
        return parent::insert($data, $returnID);
    }

    // Override update untuk auto-convert grade
    public function update($id = null, $data = null): bool
    {
        if (isset($data['nilai_angka'])) {
            $data['nilai_huruf'] = $this->convertGrade($data['nilai_angka']);
        }
        return parent::update($id, $data);
    }

    public function getNilaiDetailById($id)
{
    return $this->db->table('nilai')
        ->select('
            nilai.*,
            mahasiswa.nim,
            mahasiswa.nama AS nama_mahasiswa,
            mahasiswa.jurusan,
            matakuliah.kode_mk,
            matakuliah.nama_mk,
            matakuliah.sks
        ')
        ->join('mahasiswa', 'mahasiswa.id = nilai.mahasiswa_id')
        ->join('matakuliah', 'matakuliah.id = nilai.matakuliah_id')
        ->where('nilai.id', $id)
        ->get()
        ->getRowArray();
}

}