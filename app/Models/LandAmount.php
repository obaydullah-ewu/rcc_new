<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandAmount extends Model
{
    use HasFactory;

    public function upazila()
    {
        return $this->belongsTo(Upazila::class);
    }

    public function landDag()
    {
        return $this->belongsTo(LandDag::class);
    }
}
