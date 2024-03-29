<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function logs()
    {
        return $this->hasMany(VehicleLog::class, 'vehicle_id', 'id');
    }
}
