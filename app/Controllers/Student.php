<?php

namespace App\Controllers;

use App\Models\VoucherModel;

class Student extends BaseController
{
    public function index()
    {
        // Check if user is logged in and is student
        if (!session()->get('role') || session()->get('role') != 'student') {
            return redirect()->to('/login');
        }

        $model = new VoucherModel();

        // Use student_id from session, not username
        $student_id = session()->get('username'); // or session()->get('id')
        
        $data['vouchers'] = $model
            ->where('student_id', $student_id)
            ->findAll();

        return view('student_voucher', $data);
    }
}