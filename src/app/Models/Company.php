<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',                  // 会社名
        'branch_name',           // 事業所
        'postal_code',           // 郵便番号
        'address',               // 住所
        'tel',                   // 電話番号
        'fax',                   // FAX
        'email',                 // Email
        'website',               // 会社URL
        'industry',              // 業種
        'capital',               // 資本金
        'number_of_employees',   // 従業員数
        'annual_sales',          // 年商
        'listed',                // 上場しているかどうか
        'established_at',        // 設立日
        'corporate_number',      // 法人番号
        'prospect_rating',       // 見込み度
        'employee_id',           // テレアポ担当者ID
        'company_group_id',      // 企業グループID
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    |
    */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function companyGroup(): BelongsTo
    {
        return $this->belongsTo(CompanyGroup::class);
    }

    public function calls(): HasMany
    {
        return $this->hasMany(Call::class);
    }

    public function latestCall()
    {
        return $this->hasOne(Call::class)->latest('called_at');
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
                ->orWhere('branch_name', 'like', "%{$keyword}%");
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

    public function scopeSearchByDateRange(Builder $query, ?string $dateColumn, ?string $startDate, ?string $endDate): Builder
    {
        if ($dateColumn && ($startDate || $endDate)) {
            $startDate = $startDate ?? '0000-01-01';
            $endDate   = $endDate ? Carbon::parse($endDate)->endOfDay()->toDateTimeString() : '9999-12-31 23:59:59';
            return $query->whereBetween($dateColumn, [$startDate, $endDate]);
        }

        return $query;
    }

    public function scopeSearchByEmployeeId($query, $employeeId)
    {
        if ($employeeId) {
            return $query->where('employee_id', $employeeId);
        }
        return $query;
    }

    public function scopeSearchByCompanyGroupId($query, $companyGroupId)
    {
        if ($companyGroupId) {
            return $query->where('company_group_id', $companyGroupId);
        }
        return $query;
    }
}
