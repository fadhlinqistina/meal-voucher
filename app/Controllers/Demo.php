<?php

namespace App\Controllers;

class Demo extends BaseController
{
    public function index()
    {
        $data['title'] = 'Live Demo - Meal Voucher System';
        return view('demo', $data);
    }
    
    // API untuk demo data
    public function getDemoData()
    {
        $role = $this->request->getGet('role') ?? 'admin';
        
        $demoData = [
            'admin' => [
                'steps' => [
                    ['title' => 'Step 1: Select Student', 'description' => 'Choose a student from the list', 'icon' => 'fa-user-graduate'],
                    ['title' => 'Step 2: Select Vendor', 'description' => 'Choose which vendor the voucher is for', 'icon' => 'fa-store'],
                    ['title' => 'Step 3: Set Amount & Expiry', 'description' => 'Enter voucher value and expiry date', 'icon' => 'fa-ring'],
                    ['title' => 'Step 4: Generate QR', 'description' => 'System generates unique SHA-256 hash', 'icon' => 'fa-qrcode'],
                ]
            ],
            'student' => [
                'steps' => [
                    ['title' => 'Step 1: View Vouchers', 'description' => 'See all vouchers assigned to you', 'icon' => 'fa-ticket-alt'],
                    ['title' => 'Step 2: Download QR', 'description' => 'Save QR code to show at cafeteria', 'icon' => 'fa-download'],
                    ['title' => 'Step 3: Show at Counter', 'description' => 'Present QR to vendor for scanning', 'icon' => 'fa-hand'],
                ]
            ],
            'vendor' => [
                'steps' => [
                    ['title' => 'Step 1: Open Scanner', 'description' => 'Launch QR scanner via camera', 'icon' => 'fa-camera'],
                    ['title' => 'Step 2: Scan QR', 'description' => 'Point camera at student\'s QR code', 'icon' => 'fa-qrcode'],
                    ['title' => 'Step 3: Instant Verification', 'description' => 'System checks: Valid? Used? Expired?', 'icon' => 'fa-check-circle'],
                    ['title' => 'Step 4: Result Displayed', 'description' => 'VALID ✅ or error message', 'icon' => 'fa-bell'],
                ]
            ]
        ];
        
        return $this->response->setJSON($demoData[$role] ?? $demoData['admin']);
    }
}