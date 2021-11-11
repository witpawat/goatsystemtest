<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthHistory extends Model
{
    use HasFactory;

    public $timestamps = false;
   

    public function goat() {
        return $this->belongsTo(Goat::class,'goat_id','goatId');
    }
}
