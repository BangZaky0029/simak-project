<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\MahasiswaModel;
use App\Models\MatakuliahModel;
use App\Models\NilaiModel;

// ==================== MAHASISWA CONTROLLER ====================
class MahasiswaController extends BaseController
{
    protected $mahasiswaModel;

    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }
        
        $data = [
            'title' => 'Data Mahasiswa',
            'mahasiswa' => $this->mahasiswaModel->paginate(10),
            'pager' => $this->mahasiswaModel->pager,
        ];
        
        return view('mahasiswa/index', $data);
    }

    public function create()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }
        
        $data = ['title' => 'Tambah Mahasiswa'];
        return view('mahasiswa/create', $data);
    }

    public function store()
    {
        if (!$this->mahasiswaModel->insert($this->request->getPost())) {
            return redirect()->back()->withInput()->with('errors', $this->mahasiswaModel->errors());
        }
        
        return redirect()->to('/mahasiswa')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }
        
        $data = [
            'title' => 'Edit Mahasiswa',
            'mahasiswa' => $this->mahasiswaModel->find($id),
        ];
        
        if (!$data['mahasiswa']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Mahasiswa tidak ditemukan');
        }
        
        return view('mahasiswa/edit', $data);
    }

    public function update($id)
    {
        if (!$this->mahasiswaModel->update($id, $this->request->getPost())) {
            return redirect()->back()->withInput()->with('errors', $this->mahasiswaModel->errors());
        }
        
        return redirect()->to('/mahasiswa')->with('success', 'Data mahasiswa berhasil diupdate!');
    }

    public function delete($id)
    {
        $this->mahasiswaModel->delete($id);
        return redirect()->to('/mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}