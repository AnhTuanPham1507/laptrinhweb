<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $table = "manager";
    protected $fillable = ['name', 'email', 'phone', 'contrySide','birthDay', 'gender', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
