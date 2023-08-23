<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',                  // 会社名
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
        'corporate_number'       // 法人番号
    ];
}
