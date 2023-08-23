<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'permission_id',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /*
    |--------------------------------------------------------------------------
    | Defining Relationships
    |--------------------------------------------------------------------------
    |
    */
    public function permission(): BelongsTo
    {
        return $this->belongsTo(Permission::class);
    }

    public function employee(): HasOne
    {
        return $this->hasOne(Employee::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Local Scopes
    |--------------------------------------------------------------------------
    |
    */
    public function scopeSearchById(Builder $query, ?int $id): Builder
    {
        if ($id) {
            return $query->where('id', $id);
        }
        return $query;
    }

    public function scopeSearchByKeyword(Builder $query, ?string $keyword): Builder
    {
        if ($keyword) {
            return $query->where('name', 'like', "%{$keyword}%")
                ->orWhere('email', 'like', "%{$keyword}%");
        }
        return $query;
    }

    public function scopeOrderByField(Builder $query, ?string $sortField, ?string $sortType): Builder
    {
        if ($sortField && $sortType) {
            return $query->orderBy($sortField, $sortType);
        }
        return $query;
    }
}
