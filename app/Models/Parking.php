<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    use HasFactory;
    protected $table = "parking";
    protected $fillable = ['type', 'identity', 'property_id'];
    public function Property()
    {
        return $this->belongsTo(Property::class, "property_id", "id");
    }
}
