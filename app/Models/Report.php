<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    protected $fillable = [
        'user_id',
        'incedents_id',
    ];
    use HasFactory;

    public function incedents(): BelongsTo
    {
        return $this->belongsTo(Incedents::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
