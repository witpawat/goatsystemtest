<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalExamination extends Model
{
    public $timestamps = false;

    public function goat() {
        return $this->belongsTo(Goat::class,'goat_id','goatId');
    }

}
