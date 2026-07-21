<?php

namespace App\Controllers;

use App\Models\VoucherModel;
use App\Models\StudentModel;
use App\Models\UserModel;

class Admin extends BaseController
{
    public function index()
    {
        $model = new VoucherModel();
        $studentModel = new StudentModel();

        // Stats
        $data['total'] = $model->countAll();
        $data['used'] = $model->where('status', 'used')->countAllResults();
        $data['unused'] = $model->where('status', 'unused')->countAllResults();
        $data['expired'] = $model->where('expiry_date <', date('Y-m-d'))->countAllResults();
        $data['total_value'] = $model->selectSum('amount')->get()->getRow()->amount ?? 0;
        
        // NEW: Recent vouchers (last 5)
        $data['recent_vouchers'] = $model->orderBy('created_at', 'DESC')->limit(5)->findAll();
        
        // NEW: Students list for modal
        $data['students'] = $studentModel->getStudents();

        return view('admin_dashboard', $data);
    }

    // Show generate form
    public function generateForm()
    {
        $studentModel = new StudentModel();
        $userModel = new UserModel();  // CHANGE THIS
        
        $data['students'] = $studentModel->getStudents();
        $data['vendors'] = $userModel->getVendors();  // CHANGE THIS
        
        return view('admin_generate_form', $data);
    }

    // Generate single voucher
    public function generateVoucher()
    {
        if (session('role') != 'admin') {
            return redirect()->to('/');
        }

        $studentId = $this->request->getPost('student_id');
        $vendorId = $this->request->getPost('vendor_id');      // NEW: can select vendor
        $amount = $this->request->getPost('amount');           // NEW: voucher value
        $expiryDate = $this->request->getPost('expiry_date');  // NEW: date picker
        
        $model = new VoucherModel();
        $studentModel = new StudentModel();
        
        // Get student details
        $student = $studentModel->getStudentById($studentId);
        
        if (!$student) {
            return redirect()->back()->with('error', 'Student not found');
        }

        $voucher = uniqid("VCH");
        $hash = hash('sha256', $voucher . $student['username'] . $vendorId . $amount);

        $model->save([
            'voucher_code' => $voucher,
            'student_id' => $student['username'],
            'vendor_id' => $vendorId,
            'hash_code' => $hash,
            'amount' => $amount,
            'status' => 'unused',
            'expiry_date' => $expiryDate,
            'generated_by' => session('username')
        ]);

        return view('admin_generate', [
            'voucher' => $voucher,
            'hash' => $hash,
            'student' => $student,
            'vendor_id' => $vendorId,
            'amount' => $amount,
            'expiry_date' => $expiryDate
        ]);
    }

    // Bulk generate for all students
    public function bulkGenerate()
    {
        if (session('role') != 'admin') {
            return redirect()->to('/');
        }

        $vendorId = $this->request->getPost('vendor_id');
        $amount = $this->request->getPost('amount');
        $expiryDate = $this->request->getPost('expiry_date');
        
        $studentModel = new StudentModel();
        $voucherModel = new VoucherModel();
        
        $students = $studentModel->getStudents();
        $generated = 0;
        
        foreach ($students as $student) {
            $voucher = uniqid("VCH");
            $hash = hash('sha256', $voucher . $student['username'] . $vendorId . $amount);
            
            $voucherModel->save([
                'voucher_code' => $voucher,
                'student_id' => $student['username'],
                'vendor_id' => $vendorId,
                'hash_code' => $hash,
                'amount' => $amount,
                'status' => 'unused',
                'expiry_date' => $expiryDate,
                'generated_by' => session('username')
            ]);
            
            $generated++;
        }
        
        // Add flashdata for SweetAlert
        session()->setFlashdata('success', "{$generated} vouchers (RM {$amount} each) generated successfully!");
        
        return redirect()->to('/admin/generate');
    }
    
    // Generate for specific students (checkbox selection)
    public function generateSelected()
    {
        if (session('role') != 'admin') {
            return redirect()->to('/');
        }

        $studentIds = $this->request->getPost('student_ids');
        $vendorId = $this->request->getPost('vendor_id');
        $amount = $this->request->getPost('amount');
        $expiryDate = $this->request->getPost('expiry_date');
        
        if (empty($studentIds)) {
            return redirect()->back()->with('error', 'No students selected');
        }
        
        $studentModel = new StudentModel();
        $voucherModel = new VoucherModel();
        $generated = 0;
        
        foreach ($studentIds as $studentId) {
            $student = $studentModel->getStudentById($studentId);
            if ($student) {
                $voucher = uniqid("VCH");
                $hash = hash('sha256', $voucher . $student['username'] . $vendorId . $amount);
                
                $voucherModel->save([
                    'voucher_code' => $voucher,
                    'student_id' => $student['username'],
                    'vendor_id' => $vendorId,
                    'hash_code' => $hash,
                    'amount' => $amount,
                    'status' => 'unused',
                    'expiry_date' => $expiryDate,
                    'generated_by' => session('username')
                ]);
                
                $generated++;
            }
        }
        
        return redirect()->to('/admin')->with('success', "{$generated} vouchers (RM {$amount} each) generated successfully!");
    }

    public function generateVoucherAPI()
    {
        if (session('role') != 'admin') {
            return $this->response->setJSON(['error' => 'Unauthorized'])->setStatusCode(401);
        }
        
        $data = $this->request->getJSON(true);
        
        $studentId = $data['student_id'] ?? null;
        $vendorId = $data['vendor_id'] ?? null;
        $amount = $data['amount'] ?? 10.00;
        $expiryDate = $data['expiry_date'] ?? date('Y-m-d', strtotime('+30 days'));
        
        $model = new VoucherModel();
        $studentModel = new StudentModel();
        
        $student = $studentModel->getStudentById($studentId);
        
        if (!$student) {
            return $this->response->setJSON(['error' => 'Student not found'])->setStatusCode(404);
        }
        
        $voucher = uniqid("VCH");
        $hash = hash('sha256', $voucher . $student['username'] . $vendorId . $amount);
        
        $model->save([
            'voucher_code' => $voucher,
            'student_id' => $student['username'],
            'vendor_id' => $vendorId,
            'hash_code' => $hash,
            'amount' => $amount,
            'status' => 'unused',
            'expiry_date' => $expiryDate,
            'generated_by' => session('username')
        ]);
        
        return $this->response->setJSON([
            'success' => true,
            'voucher' => $voucher,
            'hash' => $hash
        ]);
    }

    // Get student vouchers via AJAX
    public function getStudentVouchers($studentId)
    {
        if (session('role') != 'admin') {
            return $this->response->setJSON(['error' => 'Unauthorized'])->setStatusCode(401);
        }
        
        $model = new VoucherModel();
        $vouchers = $model->where('student_id', $studentId)->findAll();
        
        return $this->response->setJSON($vouchers);
    }
}