<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $primaryKey = 'employee_id';

    protected $fillable = [
        'username', 
        'password', 
        'first_name', 
        'last_name', 
        'role', 
        'contact_no', 
        'department'
    ];
}
