<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'kg',
        'metre_run',
        'balance',
        'colour',
        'description'
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:i',  
        'updated_at' => 'datetime:d/m/Y H:i'
    ];
}
