<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermanentAddress extends Model
{
    use HasFactory;

    public function perDistrict()
    {
        return $this->belongsTo(Division::class, 'per_district');
    }

    public function perUpazila()
    {
        return $this->belongsTo(Upazila::class, 'per_upazila');
    }

    public function perPostOffice()
    {
        return $this->belongsTo(PostOffice::class, 'per_post_office');
    }

    public function perWard()
    {
        return $this->belongsTo(Ward::class, 'per_ward');
    }

    public function perVillage()
    {
        return $this->belongsTo(Village::class, 'per_village');
    }

}
