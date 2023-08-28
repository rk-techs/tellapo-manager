<?php

namespace App\Models;

use App\Enums\CallResult;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Call extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'employee_id',
        'called_at',
        'result',
        'receiver_info',
        'notes',
    ];

    protected $casts = [
        'called_at' => 'datetime:Y-m-d',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    |
    */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    |
    */

    /**
     * Get the label for the 'result' attribute.
     *
     * @return string|null
     */
    public function getResultLabelAttribute(): ?string
    {
        return CallResult::getLabel($this->result);
    }

    public function getResultClassNameAttribute(): string
    {
        $constantName = CallResult::getConstantName($this->result);
        return strtolower($constantName);
    }

    public function getFormattedCalledAtAttribute(): string
    {
        return $this->called_at->format('Y-m-d H:i');
    }
}
