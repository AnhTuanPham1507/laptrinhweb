<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnerMember extends Model
{
    use HasFactory;
    protected $table = "owner_member";
    protected $fillable = ['name', 'birthDay', 'gender', 'relationship', 'owner_id'];
    public function Owner()
    {
        return $this->belongsTo(Owner::class, "owner_id", "id");
    }
}
