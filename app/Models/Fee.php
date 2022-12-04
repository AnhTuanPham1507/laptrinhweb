<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;
    protected $table = "fee";
    protected $fillable = ['namencc','namekh','other_fee', 'month', 'electric_fee', 'water_fee', 'management_fee', 'parking_fee', 'status', 'property_id'];
    public function Property()
    {
        return $this->belongsTo(Property::class, "property_id", "id");
    }
}
