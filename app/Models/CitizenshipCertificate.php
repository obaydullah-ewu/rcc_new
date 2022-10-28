<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitizenshipCertificate extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopePending($query)
    {
        return $this->where('status', CITIZENSHIP_CERTIFICATE_STATUS_PENDING);
    }

    public function scopeApproved($query)
    {
        return $this->where('status', CITIZENSHIP_CERTIFICATE_STATUS_APPROVED);
    }

    public function scopeCancelled($query)
    {
        return $this->where('status', CITIZENSHIP_CERTIFICATE_STATUS_CANCELLED);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
