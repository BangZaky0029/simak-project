<?php

namespace App\Models;

use CodeIgniter\Model;

// ==================== MATA KULIAH MODEL ====================
class MatakuliahModel extends Model
{
    protected $table      = 'matakuliah';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kode_mk', 'nama_mk', 'sks'];
    protected $useTimestamps = true;
    
    protected $validationRules = [
        'kode_mk' => 'required|is_unique[matakuliah.kode_mk,id,{id}]',
        'nama_mk' => 'required|min_length[3]',
        'sks'     => 'required|integer',
    ];
    
    protected $validationMessages = [
        'kode_mk' => [
            'required'  => 'Kode Mata Kuliah wajib diisi',
            'is_unique' => 'Kode Mata Kuliah sudah terdaftar',
        ],
    ];
}