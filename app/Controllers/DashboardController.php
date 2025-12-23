<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\MahasiswaModel;
use App\Models\MatakuliahModel;
use App\Models\NilaiModel;

// ==================== DASHBOARD CONTROLLER ====================
class DashboardController extends BaseController
{
    public function index()
    {
        // Cek autentikasi
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }
        
        $mahasiswaModel = new MahasiswaModel();
        $matakuliahModel = new MatakuliahModel();
        $nilaiModel = new NilaiModel();
        
        $data = [
            'title' => 'Dashboard Admin',
            'total_mahasiswa' => $mahasiswaModel->countAll(),
            'total_matakuliah' => $matakuliahModel->countAll(),
            'total_nilai' => $nilaiModel->countAll(),
            'username' => session()->get('username'),
        ];
        
        return view('dashboard/index', $data);
    }
}
