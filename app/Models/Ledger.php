<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    use HasFactory;

    protected $fillable = [
        'material',   
        'meter',
        'payment',
        'balance',
        'cost'
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y h:i a',  
        'updated_at' => 'datetime:d/m/Y h:i a'
    ];
}
