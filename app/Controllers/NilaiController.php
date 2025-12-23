<?php

namespace App\Controllers;

use App\Models\MatakuliahModel;
use App\Models\NilaiModel;
use App\Models\MahasiswaModel;

// ==================== NILAI CONTROLLER ====================
class NilaiController extends BaseController
{
    protected $nilaiModel;
    protected $mahasiswaModel;
    protected $matakuliahModel;

    public function __construct()
    {
        $this->nilaiModel = new NilaiModel();
        $this->mahasiswaModel = new MahasiswaModel();
        $this->matakuliahModel = new MatakuliahModel();
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }
        
        $data = [
            'title' => 'Data Nilai',
            'nilai' => $this->nilaiModel->getNilaiWithDetails(),
        ];
        
        return view('nilai/index', $data);
    }

    public function create()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }
        
        $data = [
            'title' => 'Input Nilai',
            'mahasiswa' => $this->mahasiswaModel->findAll(),
            'matakuliah' => $this->matakuliahModel->findAll(),
        ];
        
        return view('nilai/create', $data);
    }

    public function store()
    {
        if (!$this->nilaiModel->insert($this->request->getPost())) {
            return redirect()->back()->withInput()->with('errors', $this->nilaiModel->errors());
        }
        
        return redirect()->to('/nilai')->with('success', 'Nilai berhasil ditambahkan!');
    }

    public function edit($id)
        {
            if (!session()->get('logged_in')) {
                return redirect()->to('/login');
            }

            $nilai = $this->nilaiModel->getNilaiDetailById($id);

            if (!$nilai) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Nilai tidak ditemukan');
            }

            return view('nilai/edit', [
                'title'      => 'Edit Nilai',
                'nilai'      => $nilai,
                'mahasiswa'  => $this->mahasiswaModel->findAll(),
                'matakuliah' => $this->matakuliahModel->findAll(),
            ]);
        }


    public function update($id)
    {
        if (!$this->nilaiModel->update($id, $this->request->getPost())) {
            return redirect()->back()->withInput()->with('errors', $this->nilaiModel->errors());
        }
        
        return redirect()->to('/nilai')->with('success', 'Nilai berhasil diupdate!');
    }

    public function delete($id)
    {
        $this->nilaiModel->delete($id);
        return redirect()->to('/nilai')->with('success', 'Nilai berhasil dihapus!');
    }

    // Laporan nilai dengan filter
    public function laporan()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }
        
        $mahasiswa_id = $this->request->getGet('mahasiswa_id');
        $matakuliah_id = $this->request->getGet('matakuliah_id');
        
        $data = [
            'title' => 'Laporan Nilai',
            'nilai' => $this->nilaiModel->getNilaiWithDetails($mahasiswa_id, $matakuliah_id),
            'mahasiswa' => $this->mahasiswaModel->findAll(),
            'matakuliah' => $this->matakuliahModel->findAll(),
            'selected_mahasiswa' => $mahasiswa_id,
            'selected_matakuliah' => $matakuliah_id,
        ];
        
        return view('nilai/laporan', $data);
    }
}