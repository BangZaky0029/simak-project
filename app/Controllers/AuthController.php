<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\MahasiswaModel;
use App\Models\MatakuliahModel;
use App\Models\NilaiModel;

// ==================== AUTH CONTROLLER ====================
class AuthController extends BaseController
{
    public function login()
    {
        // Jika sudah login, redirect ke dashboard
        if (session()->get('logged_in')) {
            return redirect()->to('/dashboard');
        }
        
        return view('auth/login');
    }

    public function authenticate()
    {
        $userModel = new UserModel();
        
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        $user = $userModel->authenticate($username, $password);
        
        if ($user) {
            // Set session
            session()->set([
                'user_id'    => $user['id'],
                'username'   => $user['username'],
                'role'       => $user['role'],
                'logged_in'  => true,
            ]);
            
            return redirect()->to('/dashboard')->with('success', 'Login berhasil!');
        } else {
            return redirect()->back()->with('error', 'Username atau password salah!');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Logout berhasil!');
    }
}
