<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccinationHistory extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table ="vaccination_histories";

    protected $fillable = [
        'goat_id', 'typeOfVaccine', 'dateOfVaccine','vaccine_staff'
    ];

    public function goat() {
        return $this->belongsTo(Goat::class,'goat_id','goatId');
    }
}
