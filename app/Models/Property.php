<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $table = "property";
    protected $fillable = ['property_number', 'type', 'floor_number', 'owner_id'];
    public function Owner()
    {
        return $this->belongsTo(Owner::class, "owner_id", "id");
    }
}
