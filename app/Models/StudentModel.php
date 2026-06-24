<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['username', 'password', 'role', 'name', 'matric_no'];
    
    public function getStudents()
    {
        return $this->where('role', 'student')->findAll();
    }
    
    public function getStudentById($id)
    {
        return $this->where('id', $id)->where('role', 'student')->first();
    }
}