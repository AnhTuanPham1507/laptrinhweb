<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = "employee";
    protected $fillable = ['name', 'email', 'phone', 'contrySide','birthDay', 'gender', 'role', 'salary', 'working_start_day', 'seniority'];

}
