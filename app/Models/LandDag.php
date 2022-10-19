<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandDag extends Model
{
    use HasFactory;
    public function mouza()
    {
        return $this->belongsTo(Mouza::class);
    }

    public function landKhotiyan()
    {
        return $this->belongsTo(LandKhotiyan::class);
    }
}
