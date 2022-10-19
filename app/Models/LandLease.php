<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class LandLease extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function applicantDivision(): BelongsTo
    {
        return $this->belongsTo(Division::class, 'applicant_division_id');
    }

    public function applicantDistrict(): BelongsTo
    {
        return $this->belongsTo(District::class, 'applicant_district_id');
    }

    public function applicantUpazila(): BelongsTo
    {
        return $this->belongsTo(Upazila::class, 'applicant_upazila_id');
    }

    public function applicantPostOffice(): BelongsTo
    {
        return $this->belongsTo(PostOffice::class, 'applicant_post_office_id');
    }

    public function applicantVillage(): BelongsTo
    {
        return $this->belongsTo(Village::class, 'applicant_village_id');
    }

    public function landDivision(): BelongsTo
    {
        return $this->belongsTo(Division::class, 'land_division_id');
    }

    public function landDistrict(): BelongsTo
    {
        return $this->belongsTo(District::class, 'land_district_id');
    }

    public function landUpazila(): BelongsTo
    {
        return $this->belongsTo(Upazila::class, 'land_upazila_id');
    }

    public function landMouza(): BelongsTo
    {
        return $this->belongsTo(Mouza::class, 'land_mouza_id');
    }

    public function landKhotiyan(): BelongsTo
    {
        return $this->belongsTo(LandKhotiyan::class, 'land_khotiyan_id');
    }

    public function landDag(): BelongsTo
    {
        return $this->belongsTo(LandDag::class, 'land_dag_id');
    }

    public function landAmount(): BelongsTo
    {
        return $this->belongsTo(LandAmount::class, 'land_amount_id');
    }

    public function scopeApplicationPending($query)
    {
        $query->where('application_status', 'pending');
    }

    public function scopeApplicationApproved($query)
    {
        $query->where('application_status', 'approved');
    }

    public function scopeApplicationCancelled($query)
    {
        $query->where('application_status', 'cancelled');
    }

    public function scopeRenewalPending($query)
    {
        $query->where('renewal_status', 'pending');
    }

    public function scopeRenewalApproved($query)
    {
        $query->where('renewal_status', 'approved');
    }

    public function scopeRenewalCancelled($query)
    {
        $query->where('renewal_status', 'cancelled');
    }

    public function surveyorInvestigationReport(): HasOne
    {
        return $this->hasOne(SurveyorInvestigationReport::class);
    }

    public function assistantComputerInvestigationReport(): HasOne
    {
        return $this->hasOne(AssistantComputerInvestigationReport::class);
    }

    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid =  Str::uuid()->toString();
        });
    }

}
