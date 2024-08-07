<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['use', 'line', 'userID', 'centerID', 'cityID' , 'PatientCompanionID','valid'];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userID', 'id');
    }
    
    public function medicalCenter(): BelongsTo
    {
        return $this->belongsTo(MedicalCenter::class, 'centerID', 'id');
    }
    
    public function city()
    {
        return $this->belongsTo(City::class, 'cityID', 'id');
    }

    public function PatientCompanion()
    {
        return $this->belongsTo(City::class, 'PatientCompanionID', 'id');
    }

}
