<?php

namespace App\Controllers;

class SecurityDemo extends BaseController
{
    public function index()
    {
        // Check if user is logged in
        if (!session()->get('username')) {
            return redirect()->to('/login');
        }
        
        // Optional: Restrict to admin only (uncomment if needed)
        // if (session()->get('role') != 'admin') {
        //     return redirect()->to('/');
        // }
        
        $data['title'] = 'Security Demo - SHA-256 Identity Binding';
        
        return view('security_demo', $data);
    }
}