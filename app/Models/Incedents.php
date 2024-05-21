<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Incedents extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'type',
        'time_start',
        'landmark',
        'image',
    ];

    protected $casts = [
        'attachments' => 'array',
    ];

  
}
