<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'role', 'name', 'matric_no', 'vendor_code'];
    
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    
    protected $validationRules = [
        'username' => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
        'password' => 'required|min_length[3]',
        'role' => 'required|in_list[student,vendor,admin]',
        'name' => 'permit_empty|max_length[100]',
        'matric_no' => 'permit_empty|max_length[50]',
        'vendor_code' => 'permit_empty|max_length[50]'
    ];
    
    protected $validationMessages = [
        'username' => [
            'required' => 'Username is required',
            'min_length' => 'Username must be at least 3 characters',
            'is_unique' => 'Username already exists'
        ],
        'password' => [
            'required' => 'Password is required',
            'min_length' => 'Password must be at least 3 characters'
        ]
    ];
    
    public function register($data)
    {
        // Hash password with MD5 (as per your system)
        $data['password'] = md5($data['password']);
        
        return $this->save($data);
    }
    
    public function getStudents()
    {
        return $this->where('role', 'student')->findAll();
    }
    
    public function getVendors()
    {
        return $this->where('role', 'vendor')->findAll();
    }

    
}