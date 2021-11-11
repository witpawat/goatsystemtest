<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gene extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'gene_name'
    ];
}
