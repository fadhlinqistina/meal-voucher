<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function doLogin()
    {
        $model = new UserModel();

        $user = $model->where('username', $this->request->getPost('username'))
                      ->where('password', md5($this->request->getPost('password')))
                      ->first();

        if ($user) {
            session()->set($user);

            // Redirect ikut role
            if ($user['role'] == 'admin') return redirect()->to('/admin');
            if ($user['role'] == 'vendor') return redirect()->to('/vendor/dashboard');
            if ($user['role'] == 'student') return redirect()->to('/student/vouchers');

            return redirect()->to('/');
        }

        return redirect()->back()->with('error', 'Invalid username or password');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
    
    // Show registration page
    public function register()
    {
        return view('register');
    }
    
    // Process registration
    public function doRegister()
    {
        $model = new UserModel();
        
        $role = $this->request->getPost('role');
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'role' => $role,
            'name' => $this->request->getPost('name')
        ];
        
        // Add student-specific fields
        if ($role == 'student') {
            $data['matric_no'] = $this->request->getPost('matric_no');
        }
        
        // Add vendor-specific fields
        if ($role == 'vendor') {
            $data['vendor_code'] = $this->request->getPost('vendor_code');
        }
        
        if ($model->register($data)) {
            return redirect()->to('/login')->with('success', 'Registration successful! Please login.');
        } else {
            $errors = $model->errors();
            return redirect()->back()->with('errors', $errors)->withInput();
        }
    }
}