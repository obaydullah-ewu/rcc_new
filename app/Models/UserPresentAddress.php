<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPresentAddress extends Model
{
    use HasFactory;

    public function preDistrict()
    {
        return $this->belongsTo(Division::class, 'pre_district');
    }

    public function preUpazila()
    {
        return $this->belongsTo(Upazila::class, 'pre_upazila');
    }

    public function prePostOffice()
    {
        return $this->belongsTo(PostOffice::class, 'pre_post_office');
    }

    public function preWard()
    {
        return $this->belongsTo(Ward::class, 'pre_ward');
    }

    public function preVillage()
    {
        return $this->belongsTo(Village::class, 'pre_village');
    }
}
