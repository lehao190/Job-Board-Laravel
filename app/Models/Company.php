<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Company extends Model
{
    use HasFactory;

    // Job model belongs to User model
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
