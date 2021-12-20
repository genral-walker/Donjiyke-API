<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'target_roll',
        'metre_run',
        'metre_out',
        'balance',
        'issuer',
        'issued_to'
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:i',  
        'updated_at' => 'datetime:d/m/Y H:i'
    ];
}
