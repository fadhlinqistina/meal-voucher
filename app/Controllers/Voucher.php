<?php

namespace App\Controllers;

use App\Models\VoucherModel;

class Voucher extends BaseController
{
    public function index()
    {
        return view('home');
    }

    public function generate()
    {
        // Vendor generate for specific student
        $model = new VoucherModel();
        
        $student = $this->request->getPost('student_id') ?? 'STU001';
        $vendorId = session('username'); // Current vendor
        
        $voucher = uniqid("VCH");
        $hash = hash('sha256', $voucher . $student . $vendorId);
        $expiry = date('Y-m-d', strtotime('+30 days'));

        $model->save([
            'voucher_code' => $voucher,
            'student_id' => $student,
            'vendor_id' => $vendorId,
            'hash_code' => $hash,
            'amount' => $this->request->getPost('amount') ?? 10.00,
            'status' => 'unused',
            'expiry_date' => $expiry,
            'generated_by' => session('username')
        ]);

        return view('generate', [
            'voucher' => $voucher,
            'student' => $student,
            'hash' => $hash
        ]);
    }

    public function verify($hash)
    {
        $model = new VoucherModel();
        $currentVendor = session('username'); // Who is scanning

        // Set timezone explicitly
        date_default_timezone_set('Asia/Kuala_Lumpur');
        
        // Use getVoucherWithDetails to get vendor name via JOIN
        $data = $model->getVoucherWithDetails($hash);

        if (!$data) {
            $status = "INVALID";
            return view('result', ['status' => $status]);
        } 
        
        // Check if vendor is authorized to scan this voucher
        if ($data['vendor_id'] != $currentVendor && session('role') != 'admin') {
            $status = "UNAUTHORIZED";
            return view('result', ['status' => $status, 'voucher' => $data]);
        }
        
        // Check if already used
        if ($data['status'] == 'used') {
            $status = "USED";
            return view('result', ['status' => $status, 'voucher' => $data]);
        } 
        
        // Check if expired
        if ($data['expiry_date'] < date('Y-m-d')) {
            $status = "EXPIRED";
            return view('result', ['status' => $status, 'voucher' => $data]);
        } 
        
        // VALID - Process the voucher
        $status = "VALID";
        
        // Add cooldown check to prevent double scan within 5 seconds
        $lastScanKey = 'last_scan_' . $hash;
        $lastScan = cache()->get($lastScanKey);
        
        if ($lastScan && (time() - $lastScan) < 5) {
            // Still within cooldown, don't process again
            return view('result', ['status' => $status, 'voucher' => $data]);
        }
        
        // Set cooldown
        cache()->save($lastScanKey, time(), 10); // 10 seconds cooldown

        // Use correct timezone for used_at - FIXED
        $now = new \DateTime('now', new \DateTimeZone('Asia/Kuala_Lumpur'));
        $currentTime = $now->format('Y-m-d H:i:s');

        // Update voucher as used
        $model->update($data['id'], [
            'status' => 'used',
            'used_by' => $currentVendor,
            'used_at' => $currentTime  // Use $currentTime, not date()
        ]);
        
        // Refresh data after update
        $data['status'] = 'used';
        $data['used_by'] = $currentVendor;
        $data['used_at'] = $currentTime;
        
        return view('result', ['status' => $status, 'voucher' => $data]);
    }

    public function scan()
    {
        return view('scan');
    }
    
    // Vendor Dashboard
    public function dashboard()
    {
        $model = new VoucherModel();
        $vendorId = session('username');
        
        // Get all vouchers for this vendor
        $allVouchers = $model->where('vendor_id', $vendorId)->findAll();
        
        // Get redeemed vouchers only
        $redeemedVouchers = $model->where('vendor_id', $vendorId)
                                  ->where('status', 'used')
                                  ->findAll();
        
        // Calculate total value
        $totalValue = 0;
        foreach ($allVouchers as $v) {
            $totalValue += $v['amount'];
        }
        
        // Calculate redeemed value
        $redeemedValue = 0;
        foreach ($redeemedVouchers as $v) {
            $redeemedValue += $v['amount'];
        }
        
        // Get recent redeemed vouchers (last 10)
        $recentVouchers = $model->where('vendor_id', $vendorId)
                                ->where('status', 'used')
                                ->orderBy('used_at', 'DESC')
                                ->limit(10)
                                ->findAll();
        
        $data = [
            'total' => count($allVouchers),
            'total_value' => $totalValue,
            'redeemed' => count($redeemedVouchers),
            'redeemed_value' => $redeemedValue,
            'recent_vouchers' => $recentVouchers
        ];
        
        return view('vendor_dashboard', $data);
    }
    
    // Vendor's own vouchers list
    public function myVouchers()
    {
        $model = new VoucherModel();
        $vendorId = session('username');
        
        $data['vouchers'] = $model->where('vendor_id', $vendorId)->orderBy('created_at', 'DESC')->findAll();
        $data['stats'] = [
            'total' => $model->where('vendor_id', $vendorId)->countAllResults(),
            'used' => $model->where('vendor_id', $vendorId)->where('status', 'used')->countAllResults(),
            'unused' => $model->where('vendor_id', $vendorId)->where('status', 'unused')->countAllResults()
        ];
        
        return view('vendor_vouchers', $data);
    }
}