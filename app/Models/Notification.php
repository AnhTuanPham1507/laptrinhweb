<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = "notification";
    protected $fillable = ['title','content','owner_id'];
    public function Owner()
    {
        return $this->belongsTo(Owner::class, "owner_id","id");
    }

}
