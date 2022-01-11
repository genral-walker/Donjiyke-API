<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $fillable = [
        'target_ledger', 
        'payment'
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y h:i a',  
        'updated_at' => 'datetime:d/m/Y h:i a'
    ];
}