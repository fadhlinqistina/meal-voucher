<?php

namespace App\Controllers;

class Landing extends BaseController
{
    public function index()
    {
        // If already logged in, redirect to dashboard
        if (session()->get('username')) {
            $role = session()->get('role');
            if ($role == 'admin') return redirect()->to('/admin');
            if ($role == 'vendor') return redirect()->to('/vendor/dashboard');
            if ($role == 'student') return redirect()->to('/student/vouchers');
        }
        
        $data['title'] = 'Meal Voucher System - Smart Campus Dining';
        
        // Get stats for landing page (public stats)
        $model = new \App\Models\VoucherModel();
        $data['total_vouchers'] = $model->countAll();
        $data['total_used'] = $model->where('status', 'used')->countAllResults();
        
        return view('landing', $data);
    }
}