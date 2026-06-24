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
        $student_id = session()->get('username');
        
        // Use getByStudent method that joins with users table
        $vouchers = $model->getByStudent($student_id);
        
        // Ensure created_at exists for sorting
        foreach ($vouchers as &$v) {
            if (!isset($v['created_at']) || empty($v['created_at'])) {
                // Use generated_at or current date as fallback
                $v['created_at'] = $v['generated_at'] ?? date('Y-m-d H:i:s');
            }
        }
        
        $data['vouchers'] = $vouchers;

        return view('student_voucher', $data);
    }
}