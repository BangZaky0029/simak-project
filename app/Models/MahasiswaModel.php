<?php

namespace App\Models;

use CodeIgniter\Model;

// ==================== MAHASISWA MODEL ====================
class MahasiswaModel extends Model
{
    protected $table      = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nim', 'nama', 'jurusan', 'angkatan'];
    protected $useTimestamps = true;
    
    protected $validationRules = [
        'nim'      => 'required|is_unique[mahasiswa.nim,id,{id}]',
        'nama'     => 'required|min_length[3]',
        'jurusan'  => 'required',
        'angkatan' => 'required|integer',
    ];
    
    protected $validationMessages = [
        'nim' => [
            'required'  => 'NIM wajib diisi',
            'is_unique' => 'NIM sudah terdaftar',
        ],
        'nama' => [
            'required'    => 'Nama wajib diisi',
            'min_length'  => 'Nama minimal 3 karakter',
        ],
    ];
}