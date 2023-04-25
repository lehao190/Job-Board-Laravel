<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{
    use HasFactory;

    // Job model belongs to User model
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    // Job Model belongs to JobLevel model
    public function job_level(): BelongsTo
    {
        return $this->belongsTo(JobLevel::class);
    }

    public function employment_type(): BelongsTo
    {
        return $this->belongsTo(EmploymentType::class);
    }
}
