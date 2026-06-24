<?php

namespace App\Models;

use CodeIgniter\Model;

class VoucherModel extends Model
{
    protected $table = 'vouchers';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'voucher_code',
        'student_id',
        'vendor_id',
        'hash_code',
        'status',
        'expiry_date',
        'amount',
        'generated_by',
        'used_by',
        'used_at'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    
    // THIS METHOD IS CRITICAL - gets vouchers with vendor details via JOIN
    public function getByStudent($studentId)
    {
        return $this->select('vouchers.*, users.name as vendor_name, users.vendor_code')
                    ->join('users', 'users.username = vouchers.vendor_id', 'left')
                    ->where('vouchers.student_id', $studentId)
                    ->orderBy('vouchers.created_at', 'DESC')
                    ->findAll();
    }
    
    public function getByVendor($vendorId)
    {
        return $this->where('vendor_id', $vendorId)->findAll();
    }
    
    public function getVoucherWithDetails($hash)
    {
        return $this->select('vouchers.*, users.name as vendor_name, users.vendor_code')
                    ->join('users', 'users.username = vouchers.vendor_id', 'left')
                    ->where('vouchers.hash_code', $hash)
                    ->first();
    }
}