<?php

namespace App\Controllers;

use App\Models\MatakuliahModel;
use App\Models\NilaiModel;
use App\Models\MahasiswaModel;

// ==================== MATA KULIAH CONTROLLER ====================
class MatakuliahController extends BaseController
{
    protected $matakuliahModel;

    public function __construct()
    {
        $this->matakuliahModel = new MatakuliahModel();
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }
        
        $data = [
            'title' => 'Data Mata Kuliah',
            'matakuliah' => $this->matakuliahModel->paginate(10),
            'pager' => $this->matakuliahModel->pager,
        ];
        
        return view('matakuliah/index', $data);
    }

    public function create()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }
        
        $data = ['title' => 'Tambah Mata Kuliah'];
        return view('matakuliah/create', $data);
    }

    public function store()
    {
        if (!$this->matakuliahModel->insert($this->request->getPost())) {
            return redirect()->back()->withInput()->with('errors', $this->matakuliahModel->errors());
        }
        
        return redirect()->to('/matakuliah')->with('success', 'Data mata kuliah berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }
        
        $data = [
            'title' => 'Edit Mata Kuliah',
            'matakuliah' => $this->matakuliahModel->find($id),
        ];
        
        if (!$data['matakuliah']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Mata kuliah tidak ditemukan');
        }
        
        return view('matakuliah/edit', $data);
    }

    public function update($id)
    {
        if (!$this->matakuliahModel->update($id, $this->request->getPost())) {
            return redirect()->back()->withInput()->with('errors', $this->matakuliahModel->errors());
        }
        
        return redirect()->to('/matakuliah')->with('success', 'Data mata kuliah berhasil diupdate!');
    }

    public function delete($id)
    {
        $this->matakuliahModel->delete($id);
        return redirect()->to('/matakuliah')->with('success', 'Data mata kuliah berhasil dihapus!');
    }
}